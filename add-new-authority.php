<?php
require("config/db.php");
require("config/login_status.php");

$authority_companies = $connect->query("SELECT * FROM authority_company")->fetch_all(MYSQLI_ASSOC);
$type_authority_dates = $connect->query("SELECT * FROM type_authority_data")->fetch_all(MYSQLI_ASSOC);
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
	<title>Yeni İstifadəçi yarat</title>

	<!--Favicon -->
	<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon" />

	<!--Bootstrap css -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Style css -->
	<link href="assets/css/style.css" rel="stylesheet" />

	<!-- Animate css -->
	<link href="assets/css/animated.css" rel="stylesheet" />

	<!-- P-scroll bar css-->
	<link href="assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

	<!-- INTERNAL Sumoselect css-->
	<link rel="stylesheet" href="assets/plugins/sumoselect/sumoselect.css">

	<!---Icons css-->
	<link href="assets/css/icons.css" rel="stylesheet" />

	<!-- Color Skin css -->
	<link id="theme" href="assets/colors/color1.css" rel="stylesheet" type="text/css" />

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
					<div class="row mt-5">
						<div class="col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-header justify-content-center">
									<div class="card-title ">YENİ İSTİFADƏÇİ YARAT</div>
								</div>
								<form id="form_id" method="post" class="needs-validation" novalidate>
                                    
									<div class="card-body">
										<div class="row">
                                            <div class="col-lg-6">
												<div class="form-group">
													<label class="form-label">Şirkət növü</label>
														<select name="company_type" class="search-box " placeholder="Seçiminizi edin...">
															<option disabled="" value="" selected>Şirkət növünü seçin...</option>
                                                            <?php

															foreach($authority_companies as $authority_company){?>

																<option value="<?php echo $authority_company['name']; ?>"><?php echo $authority_company['name']; ?></option>
															<?php }?>
														</select>
												</div>
											</div>
                                            <div class="col-lg-6">
												<div class="form-group">
													<label class="form-label">Baza statusu</label>
														<select name="status" class="search-box " placeholder="Seçiminizi edin...">
															<option disabled="" value="" selected>Seçiminizi edin...</option>
                                                            <option>Quraşdırılıb</option>
                                                            <option>Quraşdırılmayıb</option>
                                                            <option>Sazlamalar edilir</option>
                                                            <option>Yenilənir</option>
														</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label class="form-label">Bazanın işlənmə səviyəsi</label>
														<select  id="u_base"	class="search-box " multiple="multiple" id="base_level" placeholder="Seçiminizi edin...">
															<?php 
															
															$arrays =["Müəssisə məlumatları","Debitor","Kreditor","Ayın bağlanması"];
															foreach($arrays as $roww):
															
															?>
                                                            
															<option ><?php echo  $roww;?></option>

															<?php endforeach; ?>
														</select>
												</div>
											</div>

											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">1C Bazası</label>
													<input type="text" name="1c_base" class="form-control" placeholder="Məsələn: 8.3. Müəssisə"
														value="" >
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">S.A.A.</label>
													<input type="text" name="fullname" class="form-control" placeholder="Soyadı Adı Ata adı"
														value="" >
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">İstifadəçi adı</label>
													<input type="text" name="login" class="form-control" placeholder="Soyadı Adı"
														value="" >
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
											
                                            <div class="col-lg-4">
												<div class="form-group">
													<label class="form-label">Səlahiyyət növü</label>
														<select name="position_type" class="search-box " placeholder="Seçiminizi edin...">
															<option disabled="" value="" selected>Seçiminizi edin...</option>
                                                            <?php

															foreach($type_authority_dates as $type_authority_data){?>

																<option value="<?php echo $type_authority_data['name']; ?>"><?php echo $type_authority_data['name']; ?></option>
															<?php }?>
														</select>
												</div>
											</div>


                                            <div class="col-sm-6 col-md-6 mt-5">
												<div class="custom-controls-stacked"> 
													<div>Giriş imkanı</div>
													<div class="d-flex">
                                                        <label class="custom-control custom-radio"> 
                                                            <input type="radio" class="custom-control-input" name="g_status" value="1" checked=""> 
                                                            <span class="custom-control-label">Açıq</span> 
                                                        </label> 
                                                        <label class="custom-control custom-radio ms-5">
                                                            <input type="radio" class="custom-control-input" name="g_status" value="0"> 
                                                            <span class="custom-control-label">Qapalı</span> 
                                                        </label>
                                                    </div>
												</div>
											</div>

										</div>
									
																	
									</div>
									<div class="card-footer text-end d-flex justify-content-end">
										<a href="1c-authority.php" class="btn btn-outline-primary" >Geri Qayıt</a>
										<div class="btn-list btn-animation ms-1">
											<button type="submit" class="btn btn-success" >Yadda saxla</button>
										</div>
									</div>
								</form>
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

    <!--INTERNAL Sumoselect js-->
    <script src="assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="assets/js/formelementadvnced.js"></script>

	<!-- Jquery js-->
	<script src="custom_js/add-new-authority.js"></script>


	

</body>

</html>