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
	<title>Yeni istifadəçi yarat</title>

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

	<!-- INTERNAL Mutipleselect css-->
	<link rel="stylesheet" href="assets/plugins/multipleselect/multiple-select.css">

	<!-- INTERNAL Sumoselect css-->
	<link rel="stylesheet" href="assets/plugins/sumoselect/sumoselect.css">

	<!-- INTERNAL multi css-->
	<link rel="stylesheet" href="assets/plugins/multi/multi.min.css">

	<!-- INTERNAL File Uploads css-->
	<link href="assets/plugins/fileupload/css/fileupload.css" rel="stylesheet" type="text/css" />

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
								<form id="form_id"  class="needs-validation user_create" novalidate>
									<div class="card-body">
										<div class="row">
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Adı</label>
													<input type="text" class="form-control" name="u_name" placeholder="Adı"
														value="" required>
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Soyadı</label>
													<input type="text" name="u_surname" class="form-control" placeholder="Soyadı"
														value="" required>
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">Ata adı</label>
													<input type="text" name="u_father_name" class="form-control" placeholder="Ata adı"
														value="" required>
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">E-poçt ünvanı</label>
													<input type="email" name="u_corp_email" class="form-control" placeholder="E-poçt ünvanı"
														value="" required>
														<div class="invalid-feedback">
															Xana boş ola bilməz!
														</div>
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group">
													<label class="form-label">Şirkət növü</label>
														<select multiple="multiple"	class="search-box " id="u_company" 	placeholder="Seçiminizi edin...">
															<option disabled="" value="">Seçiminizi edin...</option>
															<?php 
															
															$sql_query =mysqli_query($connect,"select * from company_name");
															while($row = mysqli_fetch_array($sql_query,MYSQLI_ASSOC)){?>
															
															?>
                                                            <option ><?php echo $row['name']; ?></option>

															<?php }?>
															</option>
														</select>
												</div>
											</div>


											<div class="col-sm-6 col-md-6">
												<div class="form-group">
                                                    <label for="sectionTypes" class="form-label">Vəzifə</label>
                                                    <div class="position-relative">
                                                        <i class="icon-users position-absolute font-size-small font-weight-bold"></i>
                                                        <select class="form-select border" name="u_position" id="sectionTypes" required>
                                                            <option selected="" disabled="" value="">Seçiminizi edin...</option>
															<?php 
															
															$sql_query3 =mysqli_query($connect,"select * from position");
															while($row3= mysqli_fetch_array($sql_query3,MYSQLI_ASSOC)){?>
															
															?>
                                                            <option ><?php echo $row3['name']; ?></option>

															<?php }?>
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>

											<div class="col-lg-6"></div>

											
                                            <div class="col-sm-12 col-md-6">
												<div class="form-group">
                                                    <div class="">Şifrə</div>
                                                    <div class="position-relative">
                                                        <i class="icon-locked position-absolute font-size-small"></i>
                                                        <input name="u_password"   class="form-control" id="password" type="password"  placeholder="Şifrəni daxil edin..." required/>	
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>		
                                                    </div>
                                                                                        
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <div class="">Təkrar şifrə</div>
                                                    <div class="position-relative">
                                                        <i class="icon-locked position-absolute font-size-small"></i>
                                                        <input type="password" class="form-control" name="u_password" id="confirm_password"  placeholder="Şifrəni təkrar daxil edin..." required/>
                                                        <span id='message'></span>
                                                        <div class="invalid-feedback" id="feedback-user"> Xana boş ola bilməz! </div>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <div class="input-group file-browser mt-5">
                                                    <label
                                                        class="input-group-text flex-wrap justify-content-center">
                                                        <div>
                                                            <i class="fa fa-link me-2"></i>
                                                            <span>Profil şəkili əlavə edin</span>
                                                        </div>
                                                        <input type="file" name="u_profile_img" class="dropify" data-height="180"
                                                            accept=".jpg, .png, .jpeg" / required>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6 mt-5">
												<div class="custom-controls-stacked"> 
													<div>Statusu</div>
													<label class="custom-control custom-radio"> 
														<input type="radio" class="custom-control-input" name="u_status" value="1" checked=""> 
														<span class="custom-control-label">Aktiv</span> 
													</label> 
													<label class="custom-control custom-radio">
														<input type="radio" class="custom-control-input" name="u_status" value="0"> 
														<span class="custom-control-label">Qeyri Aktiv</span> 
													</label>
												</div>
											</div>

										</div>
									
																	
									</div>
									<div class="card-footer d-flex justify-content-end">
										<div class="btn-list btn-animation ms-1">
											<button type="submit" class="btn btn-success" >Tamamla</button>
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

	<!-- INTERNAL File uploads js -->
	<script src="assets/plugins/fileupload/js/dropify.js"></script>
	<script src="assets/js/filupload.js"></script>

	<!-- User js-->
    <script src="assets/js/user.js"></script>

	    <!-- Jquery js-->
    <script src="custom_js/user.js"></script>
	<script src="custom_js/index.js"></script>


	

</body>

</html>