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
	<title>İstifadəçi siyahısı</title>

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
					<div class="row flex-lg-nowrap">
						<div class="col-12">
							<div class="row flex-lg-nowrap">
								<div class="col-12 mb-3">
									<div class="e-panel card mt-5">
										<div class="basic-header">
											<div></div>
											<div class="card-header align-items-center">
												<div class="card-title">İSTİFADƏÇİLƏR</div>
											</div>
											<div class="card-header">
											<?php
												$positions = ["Admin"];
												if(in_array($user_inf['u_position'],$positions)):
											?>
												<a class="btn btn-success d-flex justify-content-center align-items-center"
													href="add-new-user.php"><i class="fa fa-wpforms me-2"></i>Yeni istifadəçi yarat +</a>
													<?php endif; ?>
											</div>
										</div>
										<div class="card-body">
											<div class="e-table">
												<div class="table-responsive table-lg mt-3">
													<table class="table table-bordered border-top text-nowrap">
														<thead>
															<tr>
																<th class="align-top border-bottom-0 text-center wd-5">№</th>
																<th class="border-bottom-0 w-30">İstifadəçilər</th>
																<th class="border-bottom-0 w-25">E-poçt ünvanı</th>
																<th class="border-bottom-0 w-10">Statusu</th>
																<th class="border-bottom-0 w-30">Şirkət növü</th>
																<?php
																		$positions = ["Admin"];
																		if(in_array($user_inf['u_position'],$positions)):
																?>
																<th class="border-bottom-0 w-20">Alətlər paneli</th>
																<?php endif; ?>

															</tr>
														</thead>
														<tbody>

														<?php
														$i = 0;
														$sql_query =mysqli_query($connect,"select * from users where is_admin=0 ORDER BY id DESC") ;
														while($row = mysqli_fetch_array($sql_query,MYSQLI_ASSOC)){ $i++?>
															
															<tr>
																<td class="align-middle text-center">
																<?php echo $i; ?>
																</td>
																<td class="align-middle">
																	<div class="d-flex">
																		<span class="avatar brround avatar-xxl d-block"
																			style="background-image: url(controller/<?php echo $row['u_profile_img']; ?>)"></span>
																		<div class="ms-3 mt-1 d-flex align-items-center">
																			<h6 class="mb-0 font-weight-bold ">
																				<span class="fullname"><?php echo $row['u_name']." ".$row['u_surname']; ?></span>
																			</h6>
																		</div>
																	</div>
																</td>
																<td class="align-middle">
																	<span class="email-address"><?php echo $row['u_corp_email']; ?></span>
																</td>
															<?php
																if( $row['u_status']==1){
																	$activ = "Aktiv";
																	$color = "primary";

																}else{
																	$activ = "Deaktiv";
																	$color = "warning";
																}

															?>
																<td class="align-middle text-center">
																	<span class="badge bg-<?php echo $color; ?> rounded-pill"
																		id="executive-status"><?php echo $activ; ?></span>
																</td>
																<td class="text-nowrap align-middle">
																<?php echo $row['u_position']; ?> 
																</td>
																<?php
																		$positions = ["Admin"];
																		if(in_array($user_inf['u_position'],$positions)):
																?>
																<td class="align-middle text-center">
																	<a class="btn btn-primary btn-circle btn-sm me-1"
																		href="editprofile.php?id=<?php echo base64_encode($row['id']); ?>"
																		data-bs-toggle="tooltip" title="Düzəliş edin">
																		<i class="fa fa-edit"></i>
																	</a>
																	<a del_id="<?php echo  $row['id'];?>" class="btn btn-danger btn-circle btn-sm del_item"
																		data-bs-toggle="tooltip"   title="Sil">
																		<i class="fa fa-trash"></i>
																	</a>
																</td>
																<?php endif; ?>
															</tr>
															<?php }?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div><!-- right app-content-->
		</div>

		<!--Footer-->
		<?php require("includes/footer.php"); ?>
		<!-- End Footer-->

		<!-- Logout Modal-->
		<?php require("includes/modals.php"); ?>
	</div>
	<!-- End Page -->

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

	<!--Footer-->
	<?php require("includes/scripts.php"); ?>
	<!-- End Footer-->


	<!-- Confirm js-->
	<script src="assets/js/main.js"></script>

	<!--Confirm js -->
	<script src="assets/js/confirm.js">deleteItemAction();</script>

	<!-- Jquery js-->
	<script src="custom_js/user.js"></script>
	
	<script src="custom_js/index.js"></script>

	<script>

		//Delete samp acts
		var deleteItemAction = function () {
				$(".del_item").click(function (e) {
					e.preventDefault();
					var xx =$(this).parent().parent();
					var user_id = $(this).attr("del_id");

					console.log(user_id);

					
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
									url: "controller/ajax_user.php?tab=del_user&del_user_id="+user_id+"",
									success: function (response) 
									{
									if(response == 'del_user'){ 
										xx.remove();
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