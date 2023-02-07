<?php
require("config/db.php");
require("config/login_status.php");
$company_names = $connect->query("SELECT * FROM company_name")->fetch_all(MYSQLI_ASSOC);
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
	<title>Şirkət növü bazası</title>

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
                     <div class="row flex-lg-nowrap mt-5">
                        <div class="col-12">
                            <div class="row flex-lg-nowrap">
                                <div class="col-12 mb-3">
                                    <div class="e-panel card p-4">
                                        <div class="card-header justify-content-center">
                                            <div class="card-title">
                                                ŞİRKƏT NÖVLƏRİ BAZASI
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="e-table">
                                                <div class="table-lg mt-3">
                                                    <form id="form_id" method="post">
                                                        <table class="table table-bordered border-top text-nowrap">
                                                            <div class="add-row mb-2">
                                                                <button type="button" id="add-new-row" class="btn">
                                                                    <i class="fa fa-plus-circle text-primary" data-bs-toggle="tooltip"  title="Sənəd növü əlavə edin"></i>
                                                                </button>
                                                            </div>
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-top border-bottom-0 text-center w-5">№</th>
                                                                    <th class="border-bottom-0 w-95">Sənəd növü</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                            <?php
                                                                $i=0;
                                                                foreach($company_names as $company_name):
                                                                $i++;
                                                                if($company_name['name'] != ""):
                                                                ?>
                                                               
                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                    <?php echo $i; ?>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <div class="col-lg-12">

                                                                            <div class="form-group m-0">
                                                                            <div>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="name[]"
                                                                                        value="<?php echo $company_name['name']; ?>">
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </td>

                                                                </tr>

                                                                <?php endif; endforeach; ?> 
                                                               
                                                            </tbody>
                                                        </table>

                                                    </form>
                                                    <div class="add-row mb-2">
                                                        <button type="button" class="btn add-new-row">
                                                            <i class="fa fa-plus-circle text-primary" data-bs-toggle="tooltip"  title="Sənəd növü əlavə edin"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button type="submit" form="form_id" class="btn btn-outline-success">Yadda saxla</button>
                                            <a href="index.php" class="btn btn-outline-primary">Geri Qayıt</a>
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
    <script src="assets/js/tablerow.js"></script>

    <script>

$(document).ready(function () {

$("#form_id").on("submit", function (e) {

    e.preventDefault();

    if (document.querySelector("#form_id").checkValidity()) {
        $.ajax({
            url: 'controller/ajax_bank.php?tab=add_company',
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
