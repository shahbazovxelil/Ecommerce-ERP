<?php
require("config/db.php");
require("config/login_status.php");

$banks = $connect->query("SELECT * FROM banks")->fetch_all(MYSQLI_ASSOC);
$company_names = $connect->query("SELECT * FROM company_name")->fetch_all(MYSQLI_ASSOC);
$unit_measures = $connect->query("SELECT * FROM unit_measure")->fetch_all(MYSQLI_ASSOC);
$currencies = $connect->query("SELECT * FROM currency")->fetch_all(MYSQLI_ASSOC);
$payment_types = $connect->query("SELECT * FROM payment_type")->fetch_all(MYSQLI_ASSOC);

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
	<title>Yeni ödəniş sənədi yarat</title>

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
									<div class="card-title ">YENİ ÖDƏNİŞ SƏNƏDİ YARAT</div>
								</div>
								<form id="form_id" class="needs-validation form" novalidate>
									<div class="card-body">

										<div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class=" form-label font-weight-bold">Təyinat</label>
                                                    <div>
                                                        <textarea type="text" name="appointment" height="400px" class="form-control" placeholder="Təyinatla bağlı məlumatı daxil edin..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <hr>
                                            </div>
											<div class="col-sm-12 col-md-3">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Ölçü vahidi</label>
                                                    <div >
                                                        <select class="search-box" name="unit_measure"  required>

                                                            <option selected="" disabled="" value="">Seçiminizi edin...</option>

															<?php

														foreach($unit_measures as $unit_measure){?>

                                                            <option value="<?php echo $unit_measure['name']; ?>"><?php echo $unit_measure['name']; ?></option>
                                                        <?php }?>
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
													<label class=" form-label font-weight-bold">Miqdar</label>
													<div>
														<input autocomplete="off" type="number" name="quantity" class="form-control quantity" placeholder="Daxil edin..." required>
														<div class="invalid-feedback">Xana boş ola bilməz! </div>
													</div>
												</div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
													<label class="form-label font-weight-bold">Qiymət</label>
													<div>
														<input autocomplete="off" type="number" name="price" class="form-control price "placeholder="Daxil edin..." required value="">
														<div class="invalid-feedback">Xana boş ola bilməz! </div>
													</div>
												</div>
											</div>
                                            <div class="col-sm-12 col-md-2">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Valyuta</label>
                                                    <div>
                                                        <select class="search-box valyute" name="currency" required>
                                                            <option selected="" disabled="" value="">Valyutanı seçin...</option>
															<?php

                                                            foreach($currencies as $currency){?>

                                                            <option value="<?php echo $currency['name']; ?>"><?php echo $currency['name']; ?></option>
                                                        <?php }?>
                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-3">
												<div class="form-group">
													<label class=" form-label font-weight-bold">Yekun Məbləğ</label>
													<div>
														<input autocomplete="off" type="text" name="total_amount" class="form-control amount"placeholder="Daxil edin..." required readonly>
														<div class="invalid-feedback">Xana boş ola bilməz! </div>
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
                                                        <select class="search-box" name="payment_type" >
                                                            <option selected disabled value="">Ödəniş növünü seçin...</option>
                                                            <?php

                                                                foreach($payment_types as $payment_type){?>

                                                                <option value="<?php echo $payment_type['name']; ?>"><?php echo $payment_type['name']; ?></option>
                                                            <?php }?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Bank</label>
                                                    <div>
                                                        <select class="search-box" id="bank_select" name="bank_name" required>
                                                        <option selected="" disabled="" value="">Bankı seçin...</option>
												   <?php

														foreach($banks as $bank){?>

														<option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?></option>
													<?php }?>
                                                        </select>
                                                        <div class="invalid-feedback">Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Bank filialı</label>
                                                    <div>
                                                        <select class="search-box " id="bank_branches" name="bank_branch" required>
                                                            <option selected="" disabled="" value="">Bank filialını seçin...</option>

                                                        </select>
                                                        <div class="invalid-feedback"> Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
                                                    <label class="form-label font-weight-bold">Şirkət</label>
                                                    <div>
                                                        <select class="search-box"  name="company_name" required>
                                                        <option selected="" disabled="" value="">Şirkət seçin...</option>
                                                        <?php
															$arr_company = explode(",",$user_inf['u_company']);
															
															?>
															<?php
																foreach($arr_company as $cmp)
																{
																	echo "<option>$cmp</option>";
																}
															?>
                                                        </select>
                                                        <div class="invalid-feedback">Xana boş ola bilməz! </div>
                                                    </div>
                                                    
                                                </div>
											</div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class=" form-label font-weight-bold">Qeyd</label>
                                                    <div>
                                                        <textarea type="text" name="note" class="form-control" placeholder="Əlavə qeydiniz varsa buraya yazın..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
										</div>										
									</div>
									<div class="card-footer d-flex justify-content-end">
                                        <div class="btn-list btn-animation ms-1">
										    <button type="submit" form="form_id" class="btn btn-success">Əlavə edin</button>
                                        </div>
										<a href="payment-documents.php" class="btn btn-danger ms-1">Ləğv et</a>
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
    <script src="assets/js/payments.js"></script>
    



	<script>

    $(document).ready(function () {

        $(document).on("change", "#bank_select", function () {

            // console.log($(this).val());
                    $.ajax({
                            url: 'controller/ajax_bank.php?tab=bank_select2',
                            dataType: 'JSON',
                            type: 'POST',
                            data: {uid:$(this).val()},
                            success: function (data) {
                                
                                if (data.status == 1) {
                                  
                                $.each(data.result, function(index, value) { 
                                    $('#bank_branches').html('');
                                    $('#bank_branches')[0].sumo.reload();

                            
                                });
                                
                                $.each(data.result, function(index, value) { 
                                
                            
                                    $("#bank_branches")[0].sumo.add(value.bank_branch_name,value.bank_branch_name);
                                });

                            
                            

                            }

                        }
                            
                        });

                });

            
                
                $("#form_id").on("submit", function (e) {

                    e.preventDefault();
                    let buttonSubmit = $(this).find('button[type="submit"]');

                    if (document.querySelector("#form_id").checkValidity()) {
                        $.ajax({
                            url: 'controller/ajax_bank.php?tab=add_payment',
                            dataType: 'JSON',
                            type: 'POST',
                            data: $("#form_id").serialize(),
                            beforeSend: function() {
                                // setting a timeout
                                buttonSubmit.addClass('btn-loaders disabled');
                            },
                            success: function (data) {
                                if (data.status == 1) {
                                    not1();
                                    setTimeout(function(){
                                        window.location.href = "payment-documents.php";
                                    },1500);
                                }else{
                                    not11();
                                }
                            }
                        });
                    }

            });

    });

    </script>



</body>

</html>
