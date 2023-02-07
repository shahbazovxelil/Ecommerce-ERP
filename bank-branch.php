<?php
require("config/db.php");
require("config/login_status.php");
$banks = $connect->query("SELECT * FROM banks")->fetch_all(MYSQLI_ASSOC);

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
	<title>Banklar</title>

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
                    <div class="row flex-lg-nowrap mt-5 mb-8">
                        <div class="col-12">
                            <div class="row flex-lg-nowrap">
                                <div class="col-12 mb-3">
                                    <div class="e-panel card p-4">
                                        <div class="card-header justify-content-center">
                                            <div class="card-title">
                                                BANK FİLİALLARI
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="e-table">
                                                <div class="table-lg mt-3">
                                                    <form id="form_id" method="post">
                                                        <table class="table table-bordered border-top text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-top border-bottom-0 text-center w-5">№</th>
                                                                    <th colspan="3" class="border-bottom-0 w-95">Bank adı</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody>


                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                        1
                                                                    </td>
                                                                    <td class="align-middle " colspan="3">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label class=" form-label">Bankı
                                                                                    seçin</label>
                                                                                <div>
                                                                                    <select id="bank_select" name="bank_name"
                                                                                        class="search-box"
                                                                                        placeholder="Seçiminizi edin...">
                                                                                        <option disabled selected>
                                                                                            Seçiminizi edin...
                                                                                        </option>
                                                                                        <?php

                                                                                        foreach($banks as $bank){?>

                                                                                        <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?></option>
                                                                                        <?php }?>
                                                                                        

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>


                                                                </tr>
                                                                <tr>
                                                                    <th class="align-top border-bottom-0 text-center w-5">№</th>
                                                                    <th class="border-bottom-0 w-95">Bank Filialı
                                                                    </th>
                                                                    
                                                                    
                                                                </tr>
                                                                

                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                        <div class="add-row mb-2">
                                                                <button type="button" class="btn click_btnn"><i
                                                                        class="fa fa-plus-circle text-primary"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Əlavə edin"></i></button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button type="submit" form="form_id" class="btn btn-success"
                                                value="Sign Up">Yadda
                                                saxla</button>
                                            <a href="index.php" class="btn btn-danger">Ləğv et</a>
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

	<!--INTERNAL Form Advanced Element -->
	<script src="assets/js/file-upload.js"></script>
	<script src="custom_js/add-new-document.js"></script>

    <!--INTERNAL Sumoselect js-->
    <script src="assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="assets/js/formelementadvnced.js"></script>
    <script src="assets/js/payments.js"></script>
    <!-- Tablerow js-->
    <script src="assets/js/tablerow2.js"></script>

    <script>

$(document).ready(function () {

    $(document).on("change", "#bank_select", function () {

 

                $.ajax({
                        url: 'controller/ajax_bank.php?tab=bank_select',
                        dataType: 'JSON',
                        type: 'POST',
                        data: {uid:$(this).val()},
                        success: function (data) {
                            $('.append').remove();
                            if (data.status == 1) {
                            
                            $.each(data.result, function(index, value) { 
                                 console.log(value.bank_branch_name); 

                                 $('tbody').append(`<tr class="append">
                                    <td class="align-middle border-bottom-0 w-5 text-center">${index+1}</td>
                                    <td class="align-middle">
                                        <div class="col-lg-12">                                                                       
                                                <div class="form-group m-0">
                                                    <div>
                                                        <input type="text"
                                                            class="form-control"
                                                            name="name1[]"
                                                            value="${value.bank_branch_name}">
                                                    </div>
                                                </div>
                                        
                                        </div>
                                    </td> 
                                    
                                </tr>`);
                             });
                           

                        }

                    }
                           
                    });

            });



$("#form_id").on("submit", function (e) {

    e.preventDefault();

    if (document.querySelector("#form_id").checkValidity()) {
        $.ajax({
            url: 'controller/ajax_bank.php?tab=add_branch',
            dataType: 'JSON',
            type: 'POST',
            data: $("#form_id").serialize(),
            success: function (data) {

                if (data.status == 1) {
                    not1();
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
