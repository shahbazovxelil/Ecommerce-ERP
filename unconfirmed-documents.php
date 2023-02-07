<?php
require("config/db.php");
require("config/login_status.php");

// $docs = $connect->query("SELECT *,
// JSON_EXTRACT(confirmation_id,'$[0]') AS cnf_user,
// DATE_FORMAT(created_time, '%d.%m.%Y') AS cr_time,
// DATE_FORMAT(confirmation_time, '%d.%m.%Y') AS cnf_time,
// JSON_EXTRACT(confirmation_id,'$[2]') AS cnf_list,
// JSON_EXTRACT(confirmation_id,'$[3]') AS cnf_note
// FROM document WHERE status = 0")->fetch_all(MYSQLI_ASSOC);

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
	<title>Təsdiqlənməyən sənədlər</title>

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
								<div class="basic-header d-flex justify-content-center">
									<div class="card-header ">
										<div class="card-title">TƏSDİQLƏNMƏYƏN SƏNƏDLƏR</div>
									</div>
								</div>
								<div class="card-body alignment">
									<div class="">
										<div class="table-responsive">
											<table class="datatable table tables table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">№</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">Sənədin İD-si</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">Sənədin Adı</th>
														<th class="wd-15p border-bottom-0 text-wrap align-middle fs-10">Kim tərəfindən</th>
														<th class="wd-20p border-bottom-0 text-wrap align-middle fs-10">Təsdiqlənməmə səbəbi</th>
														<th class="wd-25p border-bottom-0 text-wrap align-middle fs-10">Alətlər Paneli</th>
													</tr>
												</thead>
												<tbody>
													<?php
													


													$sql = mysqli_query($connect,"SELECT * FROM notes");


													$i=0;
													while($res = mysqli_fetch_array($sql,MYSQLI_ASSOC)){$i++;
													
													
															$q = mysqli_query($connect,"SELECT * FROM document WHERE id = '".$res['doc_id']."'");

															$doc = mysqli_fetch_array($q);

															$cmp_arr = explode(",",$user_inf['u_company']);
															if(in_array($doc['company_name'],$cmp_arr)):
															
													
													?>




													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $res['doc_id']; ?></td>



														<td>
															<span><?php echo $doc['document_name']; ?></span>
														</td>
															
															<?php 
															$q1 = mysqli_query($connect,"SELECT * FROM users WHERE id = '".$res['user_id']."'");

															$user_inf1 = mysqli_fetch_array($q1);
															
															?>
														<td>
															<span><?php echo $user_inf1['u_name']." ".$user_inf1['u_surname']; ?></span>
														</td>	
																					
														<td ><span>
															<?php echo $res['cancel_notes']; ?>
														</span></td>
														<td class="d-flex justify-content-center">

                                                            <a  href="controller/<?php echo $doc['document_file']; ?>" download class="btn btn-primary btn-circle btn-sm me-1 see_act" data-bs-toggle="tooltip" title="Sənədi Yüklə">
																<i class="fa fa-download"></i>
															</a>

														</td>
													</tr>

													<?php endif; } ?>
												
													
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

	<!-- Custom js-->
	<script src="custom_js/index.js"></script>


</body>

</html>