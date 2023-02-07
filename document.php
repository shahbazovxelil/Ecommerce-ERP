<?php
require("config/db.php");
require("config/login_status.php");

$arr_comp = $user_inf['u_company'];

$exp = explode(',',$arr_comp);





$docs = $connect->query("SELECT *,
DATE_FORMAT(created_time, '%d.%m.%Y %H:%i:%s') AS cr_time,
DATE_FORMAT(confirmation_time, '%d.%m.%Y %H:%i:%s') AS cnf_time,
JSON_EXTRACT(confirmation_id,'$[2]') AS cnf_list,
JSON_EXTRACT(see_status,'$[0]') AS see_list
FROM document WHERE status = 0 ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);

$count = $connect->query("SELECT * FROM users WHERE u_position = 'Holdingin Baş Kassiri' OR u_position = 'Holdingin Maliyyə Direktorunun köməkçisi' OR u_position = 'Holdingin Maliyyə Direktoru' OR u_position = 'Holdingin Baş Maliyyə Auditoru'")->num_rows;



														





?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="Fitolab" name="description">
	<meta content="LIB" name="author">
	<meta name="keywords" content="Ecommerce">

	<!-- Title -->
	<title>Sənədlər</title>

	<!--Favicon -->
	<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon" />

	<!--Bootstrap css -->
	<link  href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Style css -->
	<link href="assets/css/style.css" rel="stylesheet" />

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

	<!--Confirm css -->
	<link rel="stylesheet" href="assets/plugins/confirm-notification/css/confirm-min.css" />

	<!-- INTERNAL Notifications  Css -->
	<link href="assets/plugins/notify/css/jquery.growl.css" rel="stylesheet" />
	<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

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
										<div class="card-title">SƏNƏDLƏR</div>
									</div>
									<div class="card-header">
										<a class="btn btn-success d-flex justify-content-center align-items-center" href="add-new-document.php"><i class="fa fa-wpforms me-2"></i>Yeni sənəd yarat +</a>
									</div>
								</div>
								<div class="card-body alignment">
									<div class="">
										<div class="table-responsive">
											<table id="example"
												class=" table tables table-bordered text-wrap key-buttons">
												<thead>
													<tr>
													<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">№</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">İD</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">Sənədin adı</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">Sənədin Müəllifi</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">Şirkət</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-5">Daxil edilmə tarixi</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Son Təsdiq və ya rədd edən</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-10">Son Tanış olma və ya Təsdiq tarixi</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">İcra statusu</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">İcra əhəmiyyəti</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-5">Sənədin növü</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-5">Qeyd</th>
														<th class="wd-25p border-bottom-0 text-wrap align-middle fs-10 w-5">Alətlər Paneli</th>
													</tr>
												</thead>
												<tbody>
												<?php
													$j = 0;
													if($_GET["page"] != 0) $i = ($_GET["page"]-1)*10; else $i = 0;
													foreach($docs as $doc):
													
													$user = $connect->query("SELECT * FROM users WHERE id = '{$doc['author_id']}'")->fetch_assoc();
													if(in_array($doc['company_name'],$exp)):
														$j++;
													 ?>
													<tr>
														<td class="fs-lg" ><?php echo $j; ?></td>
														<td class="fs-lg" ><?php echo $doc['id']; ?></td>
														<td class="fs-lg" ><?php echo $doc['document_name']; ?></td>
														<td class="fs-lg" >
															<span><?php echo $user['u_name']." ".$user['u_surname']; ?></span>
														</td>




														<td class="fs-lg" >
															<span><?php echo $doc['company_name']; ?></span>
														</td>
														
														
														<td class="fs-lg" ><span><?php echo $doc['cr_time']; ?></span></td>
														<td class="fs-lg" ><span><?php
														 if($doc['last_confirmation_status'] == 1) echo $doc['last_confirmation_name']; 
														 if($doc['last_confirmation_status'] == 2) echo $doc['user_id'];
														 ?></span></td>
														<td class="fs-lg" ><span><?php echo $doc['cnf_time']; ?></span></td>
														<td class="text-center fs-lg">
														<?php 
															$cnf_array = json_decode($doc['cnf_list']);
															$see_array = json_decode($doc['see_list']);
															$four_man_array = [36,37,38,39];

															if(in_array($user_inf['id'],$see_array))
															
															{
																$conf_disabled = "";

															}
															elseif(!in_array($user_inf['id'],$see_array) && in_array($user_inf['id'],$four_man_array)  ){
																$conf_disabled = "disabled";
															}
															else{
																$conf_disabled = "";
															}


															$arr_keys = count(array_keys($cnf_array, "1"));
															if($count == $arr_keys) echo '<span class="badge bg-success rounded-pill">Təsdiqlənib</span>';
															else if(in_array("0",$cnf_array)) echo '<span class="badge bg-danger rounded-pill">Rədd edilib</span>';
													
															else echo '<span class="badge bg-warning rounded-pill">Gözləmə</span>';

															?></td>
														<td class="text-center fs-lg">
															<?php if($doc['document_important'] == "Çox əhəmiyyətli"): ?>
															<span class="badge bg-danger fs-lg px-3 rounded-pill text-white"> <?php echo $doc['document_important']; ?></span>
															<?php endif; ?>

															<?php if($doc['document_important'] == "Əhəmiyyətli"): ?>
															<span class="badge bg-info fs-lg px-3 rounded-pill text-white"> <?php echo $doc['document_important']; ?></span>
															<?php endif; ?>

															<?php if($doc['document_important'] == "Az əhəmiyyətli"): ?>
															<span class="badge bg-success fs-lg px-3 rounded-pill text-white"> <?php echo $doc['document_important']; ?></span>
															<?php endif; ?>
														
														</td>
														<td class="fs-lg" ><span><?php echo $doc['document_type']; ?></span></td>
														
														<td class="fs-lg" ><span class="spannote"><?php echo $doc['notes']; ?></span></td>
														<td doc_id="<?php echo $doc['id']; ?>" class="d-flex justify-content-center">

                                                            <a  href="controller/<?php echo $doc['document_file']; ?>" download class="btn btn-primary btn-circle btn-sm me-1 see_act" data-bs-toggle="tooltip" title="Sənədi Yüklə">
																<i class="fa fa-download"></i>
															</a>
															<?php
																$positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru", "Admin"];
															?>
															<a class="btn btn-primary btn-circle btn-sm me-1 see" data-bs-toggle="modal" data-bs-target=".seeModal" title="Sənədlə Tanış Olun">
																<i class="fa fa-eye"></i>
															</a>
																
															<a class="btn btn-primary btn-circle btn-sm me-1 confirm <?php echo $conf_disabled; ?>" data-bs-toggle="modal" data-bs-target=".submitModal" title="Sənədi Təsdiqlə">
																<span class="font-weight-semibold">T</span>
															</a>
															<a  class="btn btn-primary btn-circle btn-sm me-1 uploadd" data-bs-toggle="modal" data-bs-target=".uploadModal" title="Yeni Sənəd Yüklə">
																<i class="fe fe-paperclip text-white"></i>
															</a>

															<a  class="btn btn-primary btn-circle btn-sm me-1 see_upload" data-bs-toggle="modal" data-bs-target=".uploadSeeModal" title="Yüklənmiş sənədlərə bax">
																<i class="fa fa-files-o text-white"></i>
															</a>
															<?php if(in_array($user_inf['u_position'],$positions)): ?>
															<a class="btn btn-primary btn-circle btn-sm me-1 note" data-bs-toggle="modal" data-bs-target=".noteModal" title="Qeyd Yaz">
																<span class="font-weight-semibold">Q</span>
															</a>
															<?php endif; ?>
															
															<?php if(in_array($user_inf['u_position'],$positions) || $doc['author_id'] == $user_inf['id']): ?>
															<a  archive_id="<?php echo $doc['id']; ?>" class="btn btn-danger btn-circle btn-sm me-1 cancelİtem" data-bs-toggle="tooltip" title="Sənədi Arxivə göndərin">
																<span class="font-weight-semibold">R</span>
															</a>
															<?php endif; ?>
														</td>
													</tr>
													<?php endif; endforeach; ?>
												</tbody>
											</table>
											<div class="main-table-basic">
										
											</div>
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

        <div>


        </div>

		<!--Footer-->
		<?php require("includes/footer.php"); ?>
		<!-- End Footer-->

		<!-- Logout Modal-->
		<?php require("includes/modals.php"); ?>

		<!-- seeModal Modal-->
		<div class="modal fade seeModal" tabindex="-1" aria-labelledby="seeModalLabel" aria-hidden="true">
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
									<table class="table tablesee tables table-bordered text-nowrap key-buttons">
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
		<!-- uploadModal Modal end -->

		<!-- submitModal Modal-->
		<div class="modal fade submitModal" tabindex="-1" aria-labelledby="submitModalLabel" aria-hidden="true">
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
									
									<table class="table tableconfirm tables table-bordered text-wrap key-buttons">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-5">№</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-15">Təsdiq edən</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle w-15">Tarix</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle w-10">Təsdiq statusu</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle w-40">Təsdiq və ya inkar səbəbi</th>
												<th class="wd-25p border-bottom-0 text-wrap align-middle w-15">Alətlər paneli</th>
											</tr>
										</thead>
										<tbody id="confirm_tbody">
										</tbody>
									</table>
								</div>
							</div>
						
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<!-- submitModal Modal end-->

		<!-- uploadModal Modal-->
		<div class="modal fade uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
						<form action="#" method="post">
							<div class="form-group">
								<label class=" form-label">Yeni sənəd haqqında qeyd yazın</label>
								<div>
									<input name="upload_modal_note" autocomplete="off" type="text" class="form-control" placeholder="Daxil edin...">
								</div>
							</div>
							<div class="form-group">
								<label class=" form-label">Yenilənmiş yeni word, excell və ya pdf faylını yükləyin ünvan</label>
								<div class="input-group file-browser mb-5">
									<input type="text" class="form-control browse-file" placeholder="Yalnız word, excell, pdf faylını seçə bilərsiniz..." readonly>
									<label class="input-group-text btn btn-primary">
											Faylı seçin 
											<input type="file" class="file-browserinput" name="upload_modal_file" id="act_file" style="display: none;" accept=".doc, .docx, .xlsx, , .xls, .pdf">
									</label>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer p-0">
					<button type="button" class="btn btn-success upload_modal_btn">Yadda saxla</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
						
					</div>
				</div>
			</div>
		</div>
		<!-- uploadModal Modal end -->

		<!-- uploadSeeModal Modal-->
		<div class="modal fade uploadSeeModal" tabindex="-1" aria-labelledby="uploadSeeModalLabel" aria-hidden="true">
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
									
									<table class="table table_upload tables table-bordered text-nowrap key-buttons">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">№</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">Adı Soyadı Ata adı</th>
												<th class="wd-15p border-bottom-0 text-wrap align-middle">Tarix</th>
												<th class="wd-10p border-bottom-0 text-wrap align-middle">Yüklənmiş yeni sənədin qeydi</th>
												<th class="wd-25p border-bottom-0 text-wrap align-middle">Alətlər paneli</th>
											</tr>
										</thead>
										<tbody id="upload_see_tbody">
											
										</tbody>
									</table>
								</div>
							</div>
						
						</form>
					</div>
					<div class="modal-footer p-0">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
					</div>
				</div>
			</div>
		</div>
		<!-- uploadModal Modal end -->

		<!-- noteModal Modal-->
		<div class="modal fade noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
						<form action="#" method="post">
							<div class="form-group">
								<label class="form-label">Qeyd</label>
								<input name="note" type="text" class="form-control" placeholder="Qeyd yazın..."
									value="" required>
									<div class="invalid-feedback">
										Xana boş ola bilməz!
									</div>
							</div>
						</form>
					</div>
					<div class="modal-footer p-0">
					<button type="button" class="btn btn-success" id="save_btn_note">Yadda saxla</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
						
					</div>
				</div>
			</div>
		</div>
		<!-- noteModal Modal end-->

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

		<!-- confirmationModal Modal-->
		<div class="modal fade confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close">&times;</button>
					</div>
					<div class="modal-body p-5">
						<form action="#" method="post">
							<div class="form-group">
								<label class="form-label">Əgər təsdiqlənmə səbəbi varsa yazın yoxdursa sadəcə yadda saxlanı vurun.</label>
								<input name="confirmation_ok_note" type="text" class="form-control" placeholder="Buraya yazın..."
									value="">
							</div>
						</form>
					</div>
					<div class="modal-footer p-0">
					<button type="button" class="btn btn-success confirmation_ok_btn">Yadda saxla</button>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
						
					</div>
				</div>
			</div>
		</div>
		<!-- cancelModal Modal end-->

		<div>


		</div>



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
	<script src="assets/js/datatablefor-index.js"></script>
	
	<!--INTERNAL Form Advanced Element -->
	<script src="assets/js/file-upload.js"></script>
	<script src="custom_js/document.js"></script>

	<script>
		var deleteItemAction = function () {
		$(".cancelİtem").click(function (e) {
			e.preventDefault();
			var xx =$(this).parent().parent();
			var archive_id = $(this).attr("archive_id");
			console.log(archive_id);
			$.confirm({
				title: 'Sənədin arxivə göndərilməsi',
				content: 'Əminsinizmi?',
				closeIcon: true,
				type: 'red',
				buttons: {
					'ARXİVLƏ': {
						btnClass: "btn-danger",
						action: function () {


        
           $.ajax({
                url: "controller/add-new-document.php?case=cancel_item",
                type: "POST",
                dataType: "json",
                data:{doc_id:archive_id},
                success: function (data) {

					if(data.status==1){
						xx.remove();
						not1();

					}
					else{

						not11();
					}
                

                }
            });
							
						}
					},
					'Ləğv EDİN': function () {
						
						
					}

				}
			});
		});
	}

	deleteItemAction();
	</script>

</body>

</html>