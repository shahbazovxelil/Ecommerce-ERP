<?php
require("config/db.php");
require("config/login_status.php");

$docs = $connect->query("SELECT *,
DATE_FORMAT(created_time, '%d.%m.%Y %H:%i:%s') AS cr_time,
DATE_FORMAT(confirmation_time, '%d.%m.%Y %H:%i:%s') AS cnf_time,
JSON_EXTRACT(confirmation_id,'$[2]') AS cnf_list,
JSON_EXTRACT(see_status,'$[0]') AS see_list
FROM payment_document  ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);


$arr_comp = $user_inf['u_company'];

$exp = explode(',',$arr_comp);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="Fitolab" name="description">
	<meta content="LIB" name="author">
	<meta name="keywords" content="Fitolab, Lib">

	<!-- Title -->
	<title>Ödəniş Sənədləri</title>

	<!--Favicon -->
	<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon" />

	<!--Bootstrap css -->
	<link  href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Style css -->
	<link href="assets/css/style.css" rel="stylesheet" />

	<!-- Animate css -->
	<link href="assets/css/animated.css" rel="stylesheet" />

	<!-- P-scroll bar css-->
	<link href="assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

	<!---Icons css-->
	<link href="assets/css/icons.css" rel="stylesheet" />

	<!-- Data table css -->
	<link href="assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css" rel="stylesheet" />
	<link href="assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css" rel="stylesheet">
	<link href="assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css" rel="stylesheet" />

	<!-- Color Skin css -->
	<link id="theme" href="assets/colors/color1.css" rel="stylesheet" type="text/css" />

    <!-- INTERNAL Notifications  Css -->
	<link href="assets/plugins/notify/css/jquery.growl.css" rel="stylesheet" />
	<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    <!--Confirm css -->
	<link rel="stylesheet" href="assets/plugins/confirm-notification/css/confirm-min.css" />

</head>

<body class="app sidebar-mini">

	<!---Global-loader-->
	<div id="global-loader">
		<img src="assets/images/svgs/loader.svg" alt="loader">
	</div>
	<!--- End Global-loader-->

	<!-- Page -->
	<div class="page is-expanded">
		<div class="page-main">

			<!--aside open-->
			<?php require("includes/aside.php"); ?>
			<!--aside closed-->

			<!-- App-Content -->
			<div class="app-content main-content">
				<div class="side-app">

					<!--app header-->
					<?php require("includes/appheader.php"); ?>
					<!--/app header-->

					<!-- Row -->
					<div class="row">
						<div class="col-12">
							<div class="card mt-5">
                            <div class="basic-header flex-wrap">
									<div class="display-sm-none"></div>
									<div class="card-header align-items-center">
										<div class="card-title">ÖDƏNİŞ SƏNƏDİ PANELİ</div>
									</div>
									<div class="card-header">
										<a class="btn btn-success d-flex justify-content-center align-items-center" href="add-new-payment-documents.php"><i class="fa fa-wpforms me-2"></i>Yenisini yarat +</a>
									</div>
								</div>
								<div class="card-body alignment">
									<div class="">
										<div class="table-responsive">
											<table id="example" class=" table tables table-bordered text-nowrap key-buttons">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">№</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-10">Şirkət</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-10">Sənədin müəllifi</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Yaradılma tarixi</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Kim tərəfindən təsdiqlənib və ya inkar edilib</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Təsdiq tarixi</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Tamamlanma tarixi</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Təyinat</th>
                                                        <th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Cəmi məbləğ</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">İcra Statusu</th>
														<th class="wd-25p border-bottom-0 text-wrap align-middle fs-10 w-10">Alətlər Paneli</th>
													</tr>
												</thead>
												<tbody>

												<?php
												$incr=1;	
												foreach($docs as $doc): 
													
													$user =$connect->query("select * from users where id={$doc['author_id']}")->fetch_array(MYSQLI_ASSOC);
													 ?>

														<?php
															$txs = json_decode($doc['confirmation_id']);
															if($txs[2][0]==1){
																$doc_status = "Təsdiqlənib";
																$color = "info";
															} else if($txs[2][0]==0){
																$doc_status = "İmtina edilib";
																$color = "danger";
															} else if($txs[2][0]==2){
																$doc_status = "Gözləmə";
																$color = "warning";
															}
															else if($txs[2][0]==3){
																$doc_status = "Tamamlandı";
																$color = "success";
															}



															if(in_array($doc['company_name'],$exp)):
															
															 ?>
													
														
												
													<tr>
														<td><?php echo $incr++;?></td>
														<td><?php echo $doc['company_name']; ?></td>
														<td><?php echo $user['u_name']." ".$user['u_surname']; ?></td>
														<td><?php echo $doc['created_time']; ?></td>
														<?php 
														
														$useridtoname  = mysqli_query($connect,"SELECT * FROM users WHERE id = {$txs[0][0]}");
														$useridto = mysqli_fetch_array($useridtoname,MYSQLI_ASSOC);
														
														
														?>
														<td><?php echo $useridto['u_name']." ".$useridto['u_surname']; ?></td>
														<td><?php echo $txs[1][0]; ?></td>
														<td><?php echo $doc['completion_date']; ?></td>
														<td>
															<span><?php echo $doc['appointment']; ?></span>
														</td>
														<td >
														<?php echo $doc['total_amount']; ?> 
														</td>

	
														<td class="text-center">
															<span class="badge bg-<?php echo $color;?> rounded-pill"><?php echo $doc_status;?></span>
														</td>
                                                        							
														
                                                        
														<td doc_par_id="<?php echo $doc['id']; ?>" class="d-flex justify-content-center">
                                                            <a href="see-payment-documents.php?uid=<?php echo  base64_encode(base64_encode($doc['id'])); ?>" class="btn btn-primary btn-circle btn-sm me-1" data-bs-toggle="tooltip" title="Ətraflı Baxın">
																<i class="fa fa-eye"></i>
															</a>

															<?php 
															$fourman = [36,37,38,39];
															$see_sts = json_decode($doc['see_status']);
															
															for($it=0; $it<count($see_sts[0]); $it++){
																if(in_array($see_sts[0][$it],$fourman)){
																	$newArray[] = $see_sts[0][$it];
																}
															}


															
															if($doc['author_id']==$user_inf['id']): 
																if(count($newArray)==0): ?>

                                                            <a href="edit-payment-documents.php?uid=<?php echo  base64_encode(base64_encode($doc['id'])); ?>" class="btn btn-primary btn-circle btn-sm me-1" data-bs-toggle="tooltip" title="Redaktə edin">
																<i class="fa fa-edit"></i>
															</a>

															<?php endif; ?>
															<?php endif; ?>

                                                            <a doc_id="<?php echo $doc['id']; ?>" class="btn btn-primary btn-circle btn-sm me-1 see" data-bs-toggle="modal" data-bs-target=".seePaymentModal" title="Sənədlə Tanış Olun">
																<i class="fa fa-file-o"></i>
															</a>

															<?php
																	$positions = ["Admin", "Holdingin Baş Maliyyə Auditoru"];
																if(in_array($user_inf['u_position'],$positions)):

																	if($doc['status']==1){
																	
																	$dis = "";
																}
																	 else {$dis = "disabled";
																	} 
															?>

                                                            <a doc_t_id="<?php echo $doc['id']; ?>" class="btn btn-primary btn-circle btn-sm me-1 <?php echo $dis; ?>  confirm " data-bs-toggle="modal" data-bs-target=".submitPaymentModal" title="Sənədi Təsdiqləyin">
																<i class="fa fa-check"></i>
															</a>

															<?php endif; ?>

															<?php
																if($doc['author_id']==$user_inf['id']):


																	$xxs = json_decode($doc['confirmation_id']);
																	if($xxs[2][0]==1 && $xxs[0][0]==36) $pis = ""; else $pis ="disabled";
															?>

															<a doc_t_but_id="<?php echo $doc['id']; ?>" class="btn btn-primary btn-circle btn-sm me-1 <?php echo $pis; ?>  t_button" data-bs-toggle="tooltip" title="Tamamla">
																<span class="font-weight-bold">T</span>
															</a>

															<?php endif; ?>
                                                            <a doc_del_id="<?php echo $doc['id']; ?>" class="btn btn-danger btn-circle btn-sm me-1 cancelPaymentİtem" data-bs-toggle="tooltip" title="Sənədi Silin">
																<i class="fa fa-trash"></i>
															</a>
														</td>
                                                        
													</tr>
													<?php  endif; ?>
													<?php  endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- /Row -->

				</div>
			</div><!-- right app-content-->
		</div>

		<!--Footer-->
		<?php require("includes/footer.php"); ?>
		<!-- End Footer-->

		<!-- Logout Modal-->
		<?php require("includes/modals.php"); ?>

        <!-- seePaymentModal Modal-->
		<div class="modal fade seePaymentModal" tabindex="-1" aria-labelledby="seePaymentModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
					<form action="#" method="post">
							<div class="">
								<div class="table-responsive">
									<table class="table tablesee datatable tables table-bordered text-nowrap ">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">№</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">Adı Soyadı Ata adı</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">Tarix</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle">Tanışolma statusu</th>
												<th class="wd-25p border-bottom-0 text-wrap align-middle">Alətlər paneli</th>
											</tr>
										</thead>
										<tbody id="see">




										</tbody>
									</table>
								</div>
							</div>
						
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<!-- seePaymentModal Modal end -->

		<!-- submitPaymentModal Modal-->
		<div class="modal fade submitPaymentModal" tabindex="-1" aria-labelledby="submitPaymentModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
						<form action="#" method="post">
							<div class="">
								<div class="table-responsive">
									
									<table class="table datatable tables table-bordered text-wrap key-buttons">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-5">№</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-15">Təsdiq edən</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-15">Tarix</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle w-15">Təsdiq statusu</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle w-35">İnkar səbəbi</th>
												<th class="wd-25p border-bottom-0 text-wrap align-middle w-15">Alətlər paneli</th>
											</tr>
										</thead>
										<tbody  id="confirm_tbody">
                        
										</tbody>
									</table>
								</div>
							</div>
						
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<!-- submitPaymentModal Modal end-->

		<!-- cancelModal Modal-->
		<div class="modal fade cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
						<form action="#" method="post">
							<div class="form-group">
								<label class="form-label">Ləğv edilmə səbəbi</label>
								<input name="confirmation_cancel_note" type="text" class="form-control" placeholder="Buraya yazın..."
									value="" required>
									<div class="invalid-feedback">
										Xana boş ola bilməz!
									</div>
							</div>
						</form>
					</div>
					<div class="modal-footer p-0">
					<button type="button" class="btn btn-success confirmation_cancel_btn">Yadda saxla</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
						
					</div>
				</div>
			</div>
		</div>
		<!-- cancelModal Modal end-->

	</div>
	<!-- End Page -->

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

	<!--Footer-->
	<?php require("includes/scripts.php"); ?>
	<!-- End Footer-->

	<!-- INTERNAL Data tables -->
	<script src="assets/plugins/datatables/DataTables/js/jquery.dataTables.js"></script>
	<script src="assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js"></script>
	<script src="assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/JSZip/jszip.min.js"></script>
	<script src="assets/plugins/datatables/pdfmake/pdfmake.min.js"></script>
	<script src="assets/plugins/datatables/pdfmake/vfs_fonts.js"></script>
	<script src="assets/plugins/datatables/Buttons/js/buttons.html5.min.js"></script>
	<script src="assets/plugins/datatables/Buttons/js/buttons.print.min.js"></script>
	<script src="assets/plugins/datatables/Buttons/js/buttons.colVis.min.js"></script>
	<script src="assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js"></script>
	<script src="assets/js/datatables.js"></script>

    <script>

		var deleteItemAction = function () {
			$(".cancelPaymentİtem").click(function (e) {
				e.preventDefault();
				let xxs =$(this).parent().parent();
			
				var doc_del_id = $(this).attr("doc_del_id");

				

				
				$.confirm({
					title: 'Məlumatın silinməsi',
					content: 'Əminsinizmi?',
					closeIcon: true,
					type: 'red',
					buttons: {
						'SİSTEMDƏN SİL': {
							btnClass: "btn-danger",
							action: function () {

							$.ajax({
								type: "get",
								dataType:"json",
								url: "controller/add_payment_document.php?case=del_doc&doc_del_id="+doc_del_id+"",
								success: function (response) 
								{
								if(response.status ==1){ 
									xxs.remove();
									not1();
								}else if(response.status == 2){
									not15();
								} else not11();
								
								}

								});
								
							}
						},
							'Bağla': function () {
							
							}
					}
				});
			});
		}

		deleteItemAction();




	$(document).ready(function() {


		$('.t_button').on("click",function(){	

			var doc_t_but_id  = $(this).attr("doc_t_but_id");

			$.ajax({
				url: "controller/add_payment_document.php?case=t_button",
				type: "POST",
				dataType: "json",
				data:{doc_id:doc_t_but_id},
				success: function (data) {
					if(data.status == 1)
					{
						not1();
						setTimeout(function(){
								window.location.href = "payment-documents.php";
						}, 1000);
					}else{
						not11();
					}
				}
			});

		});




		$(document).on("click",".see",function(){

			let doc_id =$(this).attr('doc_id');
			let thiss = $(this).parents("td");

			$.ajax({
				url: "controller/add_payment_document.php?case=user_list_see",
				type: "POST",
				dataType: "json",
				data:{doc_id:doc_id},
				success: function (data) {

					let ids = JSON.parse(data.doc.see_status)[0];
					let seedate = JSON.parse(data.doc.see_status)[1];
					
					
					$("#see").empty();
					$.each(data.users_list, function(i,item){
						index = ids.indexOf(item.id.toString());
						if(data.my_id == item.id) disabled = "see_btn"; else disabled = "disabled";
						if(index != -1)
						{
							btn = 'btn-success';
							dsbld = "disabled";
							s_date = seedate[index];
							see = '<span class="badge bg-success rounded-pill">Tanış olub</span>';
						} 
						else 
						{
							btn = 'btn-dark';
							dsbld = "";
							s_date = '';
							see = '<span class="badge bg-danger rounded-pill">Tanış olmayıb</span>';
						}
						num = i+1;
						$("#see").append(`
						<tr>
							<td>${num}</td>
							<td>${item.u_name} ${item.u_surname}</td>
							<td>
								<span>${s_date}</span>
							</td>
							<td class="text-center">
								
								${see}
							
							<td class="d-flex justify-content-center">
								<a class="btn ${btn} text-white btn-circle btn-sm ${disabled} ${dsbld}" title="Tanış ol">
									<i class="fe fe-check"></i>
								</a>
							</td>
						</tr>
						`);		
					});	

					$(".tablesee").dataTable();
				}
			});

			$(document).off("click",".see_btn").on("click",".see_btn",function(){
				$.ajax({
					url: "controller/add_payment_document.php?case=user_see_confirm",
					type: "POST",
					dataType: "json",
					data:{doc_id:doc_id},
					success: function (data) {
						if(data.status == 1)
						{
							$(".seeModal").modal("hide");
							not1();
							setTimeout(function(){
								window.location.href = "payment-documents.php";
							}, 1000);
							
						}else{
							not11();
						}

					}
				});
				
			});

		});

			
	$(document).on("click",".confirm",function(){

	let doc_t_id = $(this).attr('doc_t_id');

	let doc_id = $(this).parents("td").attr('doc_par_id');

	let thiss = $(this).parents("td");

	$.ajax({
		url: "controller/add_payment_document.php?case=user_list_confirm",
		type: "POST",
		dataType: "json",
		data:{doc_id:doc_t_id},
		success: function (data) {
			let ids = JSON.parse(data.doc.confirmation_id)[0];
			let c_date = JSON.parse(data.doc.confirmation_id)[1];
			let c_status = JSON.parse(data.doc.confirmation_id)[2];
			let comment = JSON.parse(data.doc.confirmation_id)[3];
			
			$("#confirm_tbody").empty();
			$.each(data.users_list, function(i,item){
				indexx = ids.indexOf(item.id.toString());
				if(data.my_id == item.id) disabled = ""; else disabled = "disabled";
				if(indexx != -1)
				{
					if(c_status[indexx] == 1) cnf_sts = '<span class="badge bg-success rounded-pill">Təsdiqlənib</span>';
					else if(c_status[indexx] == 0) cnf_sts = '<span class="badge bg-danger rounded-pill">Rədd edilib</span>';
					s_date = c_date[indexx];
					dsbld = "disabled";
					

				} 
				 else 
				 {
					cnf_sts = '<span class="badge bg-warning rounded-pill">Gözləmə</span>';
					s_date = "";
					dsbld = "";

				 }
				num = i+1;


				if(comment[indexx]==undefined){comment[indexx]="";}
				$("#confirm_tbody").append(`
				<tr>
					<td>${num}</td>
					<td>${item.u_name} ${item.u_surname}</td>
					<td>
						<span>${s_date}</span>
					</td>
					<td class="text-center">
						
						${cnf_sts}
					</td>
					<td class=" fs-11">
						
					  ${comment[indexx]}
					</td>
					<td class="d-flex justify-content-center">
					
						<a class="btn btn-success text-white btn-circle btn-sm  ms-2 confirm_btn ${disabled} ${dsbld}" title="Təsdiqlə">
							<i class="fe fe-check"></i>
						</a>
						<a class="btn btn-danger text-white btn-circle btn-sm  ms-2 ${disabled} ${dsbld}" data-bs-toggle="modal" data-bs-target=".cancelModal" title="İnkar Edin">
							<i class="fe fe-check"></i>
						</a>
					</td>
				</tr>
				`);		
			});	

			$(".tableconfirm").dataTable();
		}
	});

	// <a class="btn btn-success text-white btn-circle btn-sm confirm_btn ${disabled} ${dsbld}" title="Təsdiqlə"> 
	//     <i class="fe fe-check"></i>
	// </a> 
	// CEMIL BU SENIN KOHNE YAZDIGIN TESDIQLEDIR







	$(document).off("click",".confirm_btn").on("click",".confirm_btn",function(){	
		
		$.ajax({
			url: "controller/add_payment_document.php?case=user_confirm_confirm",
			type: "POST",
			dataType: "json",
			data:{doc_id:doc_id},
			success: function (data) {
				if(data.status == 1)
				{
					$(".submitPaymentModal").modal("hide");
					not1();
					setTimeout(function(){
						window.location.href = "payment-documents.php";
					}, 1000);
				}else{
					not11();
				}

			}
		});
		
	});



///////////////////////////////

	$(document).off("click",".confirmation_cancel_btn").on("click",".confirmation_cancel_btn",function(){
		
		$.ajax({
			url: "controller/add_payment_document.php?case=user_confirm_cancel",
			type: "POST",
			dataType: "json",
			data:{doc_id:doc_id,confirmation_cancel_note:$("input[name='confirmation_cancel_note']").val(),
			hid_user_id:$("input[name='hid_user_id']").val()},
			success: function (data) {
				if(data.status == 1)
				{
					$(".submitPaymentModal").modal("hide");
					$(".cancelModal").modal("hide");
					not1();
					setTimeout(function(){
						window.location.href = "payment-documents.php";
					}, 1000);
				}

			}
		});
		
	});


	$(document).off("click",".confirmation_ok_btn").on("click",".confirmation_ok_btn",function(){
		$.ajax({
			url: "controller/add_payment_document.php?case=user_confirm_ok",
			type: "POST",
			dataType: "json",
			data:{doc_id:doc_id,confirmation_ok_note:$("input[name='confirmation_ok_note']").val(),
			hid_user_ok_id:$("input[name='hid_user_ok_id']").val()},
			success: function (data) {
				if(data.status == 1)
				{
					$(".confirmationModal").modal("hide");
					$(".submitPaymentModal").modal("hide");
					$(".cancelModal").modal("hide");
					not1();
					setTimeout(function(){
						window.location.href = "payment-documents.php";
					}, 1000);
				}

			}
		});
		
	});



});







});
	</script>


</body>

</html>