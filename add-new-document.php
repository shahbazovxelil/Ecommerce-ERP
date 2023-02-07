<?php
require("config/db.php");
require("config/login_status.php");

$document_type_dates = $connect->query("SELECT * FROM document_type_data")->fetch_all(MYSQLI_ASSOC);
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
	<title>Yeni sənəd yarat</title>

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
									<div class="card-title ">YENİ SƏNƏD YARAT</div>
								</div>
								<form class="needs-validation form" novalidate>
									<div class="card-body">

										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class=" form-label">Sənədin Adı</label>
													<div>
														<input name="document_name" autocomplete="off" type="text" class="form-control"placeholder="Daxil edin..." required>
														<div class="invalid-feedback">Xana boş ola bilməz! </div>
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
                                                    <label for="userType" class="form-label">Sənədin növü</label>
                                                    <div class="position-relative">
                                                        <i class="icon-users position-absolute font-size-small font-weight-bold"></i>
                                                        <select  name="document_type" class="form-select border" id="userType" required>

                                                            <option selected="" disabled="" value="">Seçiminizi edin...</option>
															<?php

															foreach($document_type_dates as $document_type_data){?>

																<option value="<?php echo $document_type_data['name']; ?>"><?php echo $document_type_data['name']; ?></option>
															<?php }?>
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
                                                    <label for="userType" class="form-label">Sənədin vacibliyi</label>
                                                    <div class="position-relative">
                                                        <i class="icon-users position-absolute font-size-small font-weight-bold"></i>
                                                        <select name="document_important" class="form-select border" id="userType" required>
                                                            <option selected="" disabled="" value="">Seçiminizi edin...</option>
															<option>Az əhəmiyyətli</option>
                                                            <option>Əhəmiyyətli</option>
                                                            <option>Çox əhəmiyyətli</option>
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
                                                    <label for="userType" class="form-label">Şirkət</label>
                                                    <div class="position-relative">
                                                        <i class="icon-users position-absolute font-size-small font-weight-bold"></i>
                                                        <select  name="company_name" class="form-select border" id="userType" required>
															<?php
															$arr_company = explode(",",$user_inf['u_company']);
															
															?>
                                                            <option selected="" disabled="" value="">Seçiminizi edin...</option>
															<?php
																foreach($arr_company as $cmp)
																{
																	echo "<option>$cmp</option>";
																}
															?>
												
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class=" form-label">Sənədi seçin</label>
                                                    <div class="input-group file-browser mb-5">
                                                        <input type="text" class="form-control browse-file" placeholder="Yalnız word, excell, pdf faylını seçə bilərsiniz..." readonly required>
														<div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                        <label class="input-group-text btn btn-primary">
                                                                Faylı seçin 
                                                                <input name="document_file" type="file" class="file-browserinput"  style="display: none;" accept=".doc, .docx, .xlsx, , .xls, .pdf" required>
                                                                
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
										</div>										
									</div>
									<div class="card-footer text-end d-flex justify-content-end">
										<div class="btn-list btn-animation">
											<button type="submit" class="btn btn-success  btn-icon">Tamamla</button>
										</div>
										
										<a href="document.php" class="btn btn-outline-primary ms-1">Geri Qayıt</a>
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

	<!--INTERNAL Form Advanced Element -->
	<script src="assets/js/file-upload.js"></script>
	<script src="custom_js/add-new-document.js"></script>


</body>

</html>
