<?php
require("config/db.php");
require("config/login_status.php");
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
	<title>1C Səlahiyyət Paneli</title>

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
										<div class="card-title">SƏLAHİYYƏT PANELİ</div>
									</div>
                                    <?php
                                        $positions = ["Admin", "Editor"];
                                        if(in_array($user_inf['u_position'],$positions)){ ?>
                                   
									<div class="card-header">
										<a class="btn btn-success d-flex justify-content-center align-items-center" href="add-new-authority.php"><i class="fa fa-wpforms me-2"></i>Yenisini yarat +</a>
									</div>
                                    <?php }
                                        else{?>
                                            <div class=""></div> 
                                            <?php 
                                    }?>
								</div>
								<div class="card-body alignment">
									<div class="">
										<div class="table-responsive">
											<table id="example" class="table tables table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">№</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">Şirkət</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">İstifadəçi adı</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">Baza statusu</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">1C Bazası</th>
                                                        <th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">Səlahiyyət növü</th>
                                                        <th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">Giriş imkanı</th>
                                                        <th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">Həll olma statusu</th>
														<th class="wd-25p border-bottom-0 text-wrap align-middle fs-10">Alətlər Paneli</th>
													</tr>
												</thead>
												<tbody>
													<?php
													
													$authoritys = $connect->query("SELECT * FROM authority")->fetch_all(MYSQLI_ASSOC);
													$i = 0;
													foreach($authoritys as $authority):
														$i++;
													?>
												
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $authority['company_type']; ?></td>
														<td>
															<span><?php echo $authority['login']; ?></span>
														</td>
														<td>
														<?php echo $authority['status']; ?>
														</td>
														<td>
															<span><?php echo $authority['1c_base']; ?></span>
														</td>
														<td>
															<span><?php echo $authority['position_type']; ?></span>
														</td>
                                                        <td class="text-center">
                                                            <?php if($authority['g_status'] == 1): ?><span class="badge bg-success fs-lg px-3 rounded-pill text-white">Açıq</span> <?php endif; ?>
															<?php if($authority['g_status'] == 0): ?><span class="badge bg-danger fs-lg px-3 rounded-pill text-white">Qapalı</span><?php endif; ?>
														</td>								
														<td class="text-center fs-lg">
														<?php if($authority['sts'] == 0): ?><span class="badge bg-info fs-lg px-3 rounded-pill text-white">Aktiv</span><?php endif; ?>
														<?php if($authority['sts'] == 1): ?><span class="badge bg-warning fs-lg px-3 rounded-pill text-white">Gözləmə</span><?php endif; ?>
														<?php if($authority['sts'] == 2): ?><span class="badge bg-success fs-lg px-3 rounded-pill text-white">Tapşırıq həll olunub</span><?php endif; ?>
                                                        </td>
                                                        
														<td class="d-flex justify-content-center">
                                                            <a href="edit-authority.php?uid=<?php echo $authority['id']; ?>" class="btn btn-primary btn-circle btn-sm me-1" data-bs-toggle="tooltip" title="Səlahiyyətini redaktə edin">
																<i class="fa fa-edit"></i>
															</a>
                                                            <?php
                                                                $positions = ["Admin"];
                                                                if(in_array($user_inf['u_position'],$positions)):
                                                            ?>
                                                            <a id="<?php echo $authority['id']; ?>" class="btn btn-info btn-circle btn-sm me-1 ttt <?php if($authority['sts'] != 1) echo 'disabled'; ?>" data-bs-toggle="tooltip"  title="Həll olmuş kimi qeyd edin">
                                                                <span>T</span>
                                                            </a>
                                                            <?php endif; ?>
															<a del_id="<?php echo $authority['id']; ?>" class="btn btn-danger btn-circle btn-sm me-1 del_item" data-bs-toggle="tooltip" title="Sil">
																<i class="fa fa-trash"></i>
															</a>
                                                            
															
														</td>
                                                        
													</tr>
												<?php endforeach; ?>
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

		<!--  Modals start-->
		<?php require("includes/modals.php"); ?>
		<!--  Modals end-->

	</div>
	<!-- End Page -->

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

	<!--Footer-->
	<?php require("includes/scripts.php"); ?>
	<!-- End Footer-->

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

	<!-- Custom js-->
	<script src="custom_js/archive.js"></script>
	<script src="custom_js/add-new-authority.js"></script>

	<script>

var deleteItemAction = function () {
			$(".del_item").click(function (e) {
				e.preventDefault();
				let xxs =$(this).parent().parent();
			
				var del_id = $(this).attr("del_id");

				

				
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
								url: "controller/ajax_bank.php?tab=del_audi&del_id="+del_id+"",
								success: function (response) 
								{
								if(response.status ==1){ 
									xxs.remove();
									not1();
								}else{

									not11();
								}
								
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

	</script>

</body>

</html>