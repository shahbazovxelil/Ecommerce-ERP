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
	<title>Log Data</title>

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
                            <div class="basic-header justify-content-center">
									<div class="card-header align-items-center">
										<div class="card-title">Loglar</div>
									</div>
								</div>
								<div class="card-body alignment">
									<div class="">
										<div class="table-responsive">
											<table class="datatable table tables table-bordered text-nowrap key-buttons">
												<thead>

												
													<tr>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-5">№</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-25">Kim tərəfindən</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10 w-40">İcrası</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10 w-30">Əməliyyat tarixi</th>
													</tr>
												</thead>
												<tbody>

												<?php
												$i=0;
												$logs = mysqli_query($connect,"SELECT * FROM logs");
												while($log =mysqli_fetch_array($logs,MYSQLI_ASSOC)):$i++;	?>
												
													<tr>
														<td><?= $i; ?></td>
														<?php 
														$user = mysqli_query($connect,"select * from users where id ='".$log['executor_id']."'")->fetch_assoc();

														
														?>
														
														<td><?= $user['u_name']." ".$user['u_surname']; ?></td>
														<td><?= $log['log_description']; ?></td>
														<td><?= $log['log_created_time']; ?></td>                                                       
													</tr>

													<?php endwhile; ?>
												
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
	<script src="assets/js/datatables.js"></script>	


</body>

</html>