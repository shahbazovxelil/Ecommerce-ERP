<?php
require("config/db.php");
require("config/login_status.php");

$uid = base64_decode(base64_decode($_GET['uid']));

$payments  = mysqli_query($connect,"SELECT * FROM payment_document WHERE id = {$uid}");
$payment = mysqli_fetch_array($payments,MYSQLI_ASSOC);

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
	<title>Ödəniş sənədi</title>

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

	<!-- INTERNAL Notifications  Css -->
	<link href="assets/plugins/notify/css/jquery.growl.css" rel="stylesheet" />
	<link href="assets/plugins/notify/css/notifIt.css" rel="stylesheet" />

    <!-- INTERNAL Sumoselect css-->
    <link rel="stylesheet" href="assets/plugins/sumoselect/sumoselect.css">

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
					<div class="row mt-5">
						<div class="col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-header justify-content-center">
									<div class="card-title ">ÖDƏNİŞ SƏNƏDİ</div>
								</div>
								
									<div class="card-body">

										<div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class=" form-label font-weight-bold">Təyinat</label>
                                                    <div>
                                                        <p class="font-italic"><?php echo $payment['appointment']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <hr style="height: 1px !important;"> 
                                            </div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Ölçü vahidi</label>
                                                    <div >
                                                        <p class="font-italic"><?php echo $payment['unit_measure']; ?></p>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
													<label class=" form-label font-weight-bold">Miqdar</label>
													<div>
                                                        <p class="font-italic"><?php echo $payment['quantity']; ?></p>
													</div>
												</div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
													<label class="form-label font-weight-bold">Qiymət</label>
													<div>
														<p class="font-italic"><?php echo $payment['price']; ?> </p>
													</div>
												</div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Valyuta</label>
                                                    <div>
                                                        <p class="font-italic"><?php echo $payment['currency']; ?></p>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label class=" form-label font-weight-bold">Yekun Məbləğ</label>
													<div>
														<p class="font-italic"><?php echo $payment['total_amount']; ?></p>
													</div>
												</div>
											</div>
                                            <div class="col-lg-12">
                                                <hr style="height: 1px !important;">
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class=" form-label font-weight-bold">Ödəniş növü</label>
                                                    <div>
                                                       <p class="font-italic"><?php echo $payment['payment_type']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Bank</label>
                                                    <div>
                                                        <p  class="font-italic"><?php echo $payment['bank_name']; ?></p>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Bank filialı</label>
                                                    <div>
                                                        <p class="font-italic"><?php echo $payment['bank_branch']; ?></p>
                                                    </div>
                                                    
                                                </div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Şirkət</label>
                                                    <div>
                                                        <p class="font-italic"><?php echo $payment['company_name']; ?></p>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-lg-12">
                                                <hr style="height: 1px !important;"> 
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class=" form-label font-weight-bold">Qeyd</label>
                                                    <div>
                                                        <p><?php echo $payment['note']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
										</div>										
									</div>
									<div class="card-footer text-end">
										<a href="payment-documents.php" class="btn btn-outline-primary">Geri qayıt</a>
									</div>
								
							</div>
						</div>
					</div>
					<!-- End Row-->

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

</body>

</html>
