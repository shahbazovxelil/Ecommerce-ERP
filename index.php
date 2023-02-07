<?php
require("config/db.php");
require("config/login_status.php");
require("classes/Apilayer.class.php");



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<!-- Meta data -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta content="Fitolab" name="description">
	<meta content="LIB" name="author">
	<meta name="keywords" content="Ecommerce">

	<!-- Title -->
	<title>Əsas səhifə</title>

	<!--Favicon -->
	<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon" />

	<!--Bootstrap css -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Style css -->
	<link href="assets/css/style.css" rel="stylesheet" />

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

	<!-- INTERNAL Sumoselect css-->
	<link rel="stylesheet" href="assets/plugins/sumoselect/sumoselect.css">

	<link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/css/main.css">


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
					<?php switch($_GET['section']):
					default: ?>

					
					<div class="row row-desk">
						<div class="card mt-5">
							<div class="basic-header flex-wrap">
								<div class="form-group m-0 p-5">
									<label class="form-label"></label>
									<select onchange="location = this.value" class="search-box " placeholder="Seçiminizi edin...">
										<option disabled="" value="" selected>Seçiminizi edin...</option>
										<option selected value="?section=default">Valyuta</option>
										<option value="?section=naturalGas">Neft, Qaz</option>
										<option value="?section=rezerv&year=<?php echo date("Y"); ?>">Valyuta rezervləri</option>
										
									</select>
								</div>
								<div class="card-header align-items-center">
									<div class="card-title">VALYUTA QRAFİKLƏRİ</div>
								</div>
								<div></div>
							</div>
							<div class="card-body alignment">
								<div class="row">
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/EUR Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün Avro
													</div>
												</div>
												<div class="position-relative "><span class="live "></span><span id="eur_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active eur_1_day eur">1 Gün</button>
													<button class="chart-non-active eur_1_week eur">1 Həftə</button>
													<button class="chart-non-active eur_1_month eur">1 Ay</button>
													<button class="chart-non-active eur_1_year eur">1 İl</button>
													<button class="chart-non-active eur_2_year eur">2 İl</button>
													<button class="chart-non-active eur_5_year eur">5 İl</button>
													<button class="chart-non-active eur_10_year eur">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class="d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/JPY Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün Japanese Yen
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="jpy_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active jpy_1_day jpy">1 Gün</button>
													<button class="chart-non-active jpy_1_week jpy">1 Həftə</button>
													<button class="chart-non-active jpy_1_month jpy">1 Ay</button>
													<button class="chart-non-active jpy_1_year jpy">1 İl</button>
													<button class="chart-non-active jpy_2_year jpy">2 İl</button>
													<button class="chart-non-active jpy_5_year jpy">5 İl</button>
													<button class="chart-non-active jpy_10_year jpy">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline2"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/GBP Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün British Pound
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="gbp_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active gbp_1_day gbp">1 Gün</button>
													<button class="chart-non-active gbp_1_week gbp">1 Həftə</button>
													<button class="chart-non-active gbp_1_month gbp">1 Ay</button>
													<button class="chart-non-active gbp_1_year gbp">1 İl</button>
													<button class="chart-non-active gbp_2_year gbp">2 İl</button>
													<button class="chart-non-active gbp_5_year gbp">5 İl</button>
													<button class="chart-non-active gbp_10_year gbp">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline3"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/CHF Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün Swiss Franc
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="chf_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active chf_1_day chf">1 Gün</button>
													<button class="chart-non-active chf_1_week chf">1 Həftə</button>
													<button class="chart-non-active chf_1_month chf">1 Ay</button>
													<button class="chart-non-active chf_1_year chf">1 İl</button>
													<button class="chart-non-active chf_2_year chf">2 İl</button>
													<button class="chart-non-active chf_5_year chf">5 İl</button>
													<button class="chart-non-active chf_10_year chf">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline4"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/NZD Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün New Zealand Dolları
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="nzd_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active nzd_1_day nzd">1 Gün</button>
													<button class="chart-non-active nzd_1_week nzd">1 Həftə</button>
													<button class="chart-non-active nzd_1_month nzd">1 Ay</button>
													<button class="chart-non-active nzd_1_year nzd">1 İl</button>
													<button class="chart-non-active nzd_2_year nzd">2 İl</button>
													<button class="chart-non-active nzd_5_year nzd">5 İl</button>
													<button class="chart-non-active nzd_10_year nzd">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline5"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">AZN/NOK Qrafik </div>
													<div class="font-italic">Azərbaycan manatı üçün Norwegian Krone
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="nok_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active nok_1_day nok">1 Gün</button>
													<button class="chart-non-active nok_1_week nok">1 Həftə</button>
													<button class="chart-non-active nok_1_month nok">1 Ay</button>
													<button class="chart-non-active nok_1_year nok">1 İl</button>
													<button class="chart-non-active nok_2_year nok">2 İl</button>
													<button class="chart-non-active nok_5_year nok">5 İl</button>
													<button class="chart-non-active nok_10_year nok">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline6"></div>
												</div>
											</div>
										</div>
									
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
					<?php break; ?>
					<?php case 'naturalGas': ?>
					<div class="row row-desk">
						<div class="card mt-5">
							<div class="basic-header flex-wrap">
								<div class="form-group m-0 p-5">
									<label class="form-label"></label>
									<select onchange="location = this.value" class="search-box " placeholder="Seçiminizi edin...">
										<option disabled="" value="" selected>Seçiminizi edin...</option>
										<option value="?section=default">Valyuta</option>
										<option value="?section=naturalGas">Neft, Qaz</option>
										<option value="?section=rezerv&year=<?php echo date("Y"); ?>">Valyuta rezervləri</option>
										
									</select>
								</div>
								<div class="card-header align-items-center">
									<div class="card-title">NEFT QAZ QRAFİKLƏRİ</div>
								</div>
								<div></div>
							</div>
							<div class="card-body alignment">
								<div class="row">
									<div class="col-sm-12 col-lg-6 mb-4">
										<div class="p-4 bg-chart">
											<div class=" d-flex justify-content-between">
												<div class="">
													<div class="card-title fs-20">TƏBİİ QAZ QRAFİKİ</div>
													<div class="font-italic">ABŞ dolları ilə
													</div>
												</div>
												<div class="position-relative "><span class="live "></span><span id="naturalGas_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active naturalGas_1_day naturalGas">1 Gün</button>
													<button class="chart-non-active naturalGas_1_week naturalGas">1 Həftə</button>
													<button class="chart-non-active naturalGas_1_month naturalGas">1 Ay</button>
													<button class="chart-non-active naturalGas_1_year naturalGas">1 İl</button>
													<button class="chart-non-active naturalGas_2_year naturalGas">2 İl</button>
													<button class="chart-non-active naturalGas_5_year naturalGas">5 İl</button>
													<button class="chart-non-active naturalGas_10_year naturalGas">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline7"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-lg-6 mb-4">
									
										<div class="p-4 bg-chart">
										
											<div class="d-flex justify-content-between">
											
												<div class="">
													<div class="card-title fs-20">BRENT NEFT QRAFİKİ </div>
													<div class="font-italic">ABŞ dolları ilə
													</div>
												</div>
												<div class="position-relative"><span class="live"></span><span id="oil_title"></span></div>
											</div>
											<div class="">
												<div class="currency-charts__ChartTimeSelector-sc-1kf16vc-5 esKSym">
													<button class="chart-non-active oil_1_day oil">1 Gün</button>
													<button class="chart-non-active oil_1_week oil">1 Həftə</button>
													<button class="chart-non-active oil_1_month oil">1 Ay</button>
													<button class="chart-non-active oil_1_year oil">1 İl</button>
													<button class="chart-non-active oil_2_year oil">2 İl</button>
													<button class="chart-non-active oil_5_year oil">5 İl</button>
													<button class="chart-non-active oil_10_year oil">10 İl</button>
												</div>
												<div class="chartjs-wrapper-demo">
													<div id="chart-timeline8"></div>
													
												</div>
											</div>
											
										</div>
									</div>

									
									
								</div>
							</div>
						</div>
					</div>

					<?php break; ?>

					<?php case 'rezerv':
						$api = new Apilayer();
						$cbar = $api->getJson("https://www.cbar.az/infoblocks/money_reserve_usd?year={$_GET['year']}");
						$cbar = str_replace("\n","",$cbar);
						preg_match_all('/<div class="valuta">(.*?)<\/div>/',$cbar,$matches);
						preg_match_all('/<div class="kod">(.*?)<\/div>/',$cbar,$matches2);

					?>
						
					<div class="row row-desk">
						<div class="card mt-5">
							<div class="basic-header flex-wrap">
								<div class="form-group m-0 p-5">
									<label class="form-label"></label>
									<select onchange="location = this.value" class="search-box " placeholder="Seçiminizi edin...">
										<option disabled="" value="" selected>Seçiminizi edin...</option>
										<option value="?section=default">Valyuta</option>
										<option value="?section=naturalGas">Neft, Qaz</option>
										<option value="?section=rezerv&year=<?php echo date("Y"); ?>">Valyuta rezervləri</option>
										
									</select>
								</div>
								<div class="card-header align-items-center">
									<div class="card-title">RƏSMİ VALYUTA EHTİYATLARI (mln. USD)</div>
								</div>
								<div></div>
							</div>
							<div class="card-body alignment">
									<div class="table_wrap">
										<div class="table_body">
											<div class="table_title">
												<p class="m-0"><?php echo $_GET['year']; ?>-ci il</p>
												<div class="date_select">
													<input value="<?php echo $_GET['year']; ?>" onchange="location = '?section=rezerv&year='+this.value" type="text" class="form-control white_dat" name="datepicker" id="datepicker" />
												</div>
											</div>
										</div>
										<div class="table_content mt-5">
											<div class="table_table">
												<div class="valuta_title">
													<div class="val_title fs-20 font-weight-bold">Tarix</div>
													<div class="kod_title fs-20 font-weight-bold">Dəyər</div>
												</div>
												<div class="table_items table-pagination paginate paginate-0">
												<?php
												if(empty($matches[1][0])) echo "Heç bir nəticə tapılmadı";
												foreach($matches[1] as $index => $match1): ?>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta"><?php echo $match1; ?></div>
													<div class="kod"><?php echo $matches2[1][$index]; ?></div>
												</div>
												<?php endforeach; ?>
												<!-- <div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">30.11.2021</div>
													<div class="kod">7018.7</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">29.10.2021</div>
													<div class="kod">7041.1</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">30.09.2021</div>
													<div class="kod">7033.8</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">31.08.2021</div>
													<div class="kod">7042.6</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">30.07.2021</div>
													<div class="kod">6496.5</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">30.06.2021</div>
													<div class="kod">6455.3</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">31.05.2021</div>
													<div class="kod">6460.4</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">30.04.2021</div>
													<div class="kod">6367.6</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">31.03.2021</div>
													<div class="kod">6356.2</div>
												</div>
												<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">26.02.2021</div>
													<div class="kod">6367.6</div>
												</div>
													<div class="table_row d-flex justify-content-between p-3" style=" opacity: 1;">
													<div class="valuta">29.01.2021</div>
													<div class="kod">6365.2</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php break; ?>
					<?php endswitch; ?>
				</div>

			</div>
		</div>
		<!-- End app-content-->

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
	<!-- Jquery js-->
	<script src="assets/js/jquery.min.js"></script>

	<!--INTERNAL Sumoselect js-->
	<script src="assets/plugins/sumoselect/jquery.sumoselect.js"></script>

	<!--INTERNAL Form Advanced Element -->
	<script src="assets/js/formelementadvnced.js"></script>

	<!--INTERNAL Chart js -->
	<script src="assets/js/apexcharts.js"></script>

	<?php $rand = rand(111111,99999999999); ?>


	<!-- datetimepicker js-->
	<script src="assets/plugins/bootstrap-datepicker/js/main.js"></script>
    	<script src="assets/js/datetime-local.js"></script>


	<script>
		
		$(document).ready(function () {
			var gasJson = <?php echo file_get_contents("includes/naturalGas.js"); ?>;
			var oilJson = <?php echo file_get_contents("includes/oil.js"); ?>;
			var currencyJson = <?php echo file_get_contents("includes/json.js"); ?>;
			
			var day = new Date().getDate();
			var month = new Date().getShortMonthName();
			var year = new Date().getFullYear();

			var dataeur = [];
			var datajpy = [];
			var datagbp = [];
			var datachf = [];
			var datanzd = [];
			var datanok = [];
			var datagas = [];
			var databrent = [];

			function ajax(span)
				{
					
							
				$.each(gasJson.series[0].data, function (i, item) {
								
					datagas.push([(new Date(item.x).getTime()), item.y]);

				});


							
				$.each(oilJson.series[0].data, function (i, item) {
						
					databrent.push([(new Date(item.x).getTime()), item.y]);

				});

				}
				ajax();


				let len = Object.keys(currencyJson.quotes).length;
				$.each(currencyJson.quotes, function (i, item) {
					dataeur.push([(new Date(i).getTime()), item.AZNEUR]);
					datajpy.push([(new Date(i).getTime()), item.AZNJPY]);
					datagbp.push([(new Date(i).getTime()), item.AZNGBP]);
					datachf.push([(new Date(i).getTime()), item.AZNCHF]);
					datanzd.push([(new Date(i).getTime()), item.AZNNZD]);
					datanok.push([(new Date(i).getTime()), item.AZNNOK]);
				});

				let eur_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNEUR"];
				$("#eur_title").html(`1 AZN = ${eur_live} EUR ${day} ${month} ${year}`);

				let jpy_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNJPY"];
				$("#jpy_title").html(`1 AZN = ${jpy_live} JPY ${day} ${month} ${year}`);

				let gbp_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNGBP"];
				$("#gbp_title").html(`1 AZN = ${gbp_live} GBP ${day} ${month} ${year}`);

				let chf_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNCHF"];
				$("#chf_title").html(`1 AZN = ${chf_live} CHF ${day} ${month} ${year}`);

				let nzd_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNNZD"];
				$("#nzd_title").html(`1 AZN = ${nzd_live} NZD ${day} ${month} ${year}`);

				let nok_live = currencyJson.quotes["<?php echo date("Y-m-d"); ?>"]["AZNNOK"];
				$("#nok_title").html(`1 AZN = ${nok_live} NOK ${day} ${month} ${year}`);


			var options1 = {
				series: [{
					name:"AZN EUR",
					data: dataeur
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options2 = {
				series: [{
					name:"AZN JPY",
					data: datajpy
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options3 = {
				series: [{
					name:"AZN GBP",
					data: datagbp
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};


			var options4 = {
				series: [{
					name:"AZN CHF",
					data: datachf
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options5 = {
				series: [{
					name:"AZN NZD",
					data: datanzd
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options6 = {
				series: [{
					name:"AZN NOK",
					data: datanok
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options7 = {
				series: [{
					name:"Natural gas USD",
					data: datagas
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			var options8 = {
				series: [{
					name:"Brent oil USD",
					data: databrent
				}],
				colors: ['#664dc9'],
				chart: {
					id: 'area-datetime',
					type: 'area',
					height: 300,
					zoom: {
						autoScaleYaxis: true
					},
					animations: {
						enabled: true,
						easing: 'easeinout',
						speed: 1500,
						animateGradually: {
							enabled: true,
							delay: 500
						},
						dynamicAnimation: {
							enabled: true,
							speed: 1000
						}
					}
				},
				
				dataLabels: {
					enabled: false
				},
				markers: {
					size: 0,
					style: 'hollow',
				},
				xaxis: {
					type: 'datetime',
					//min: new Date('01 Mar 2009').getTime(),
					//tickAmount: 6,
				},
				tooltip: {
					x: {
						format: 'dd MMM yyyy'
					}
				},
				fill: {
					type: 'gradient',
					gradient: {
						shadeIntensity: 1,
						opacityFrom: 0.7,
						opacityTo: 0.9,
						stops: [0, 100]
					}
				},
			};

			



			$(document).on("click", ".eur_10_year", function () {
				chart.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".eur_5_year", function () {
				chart.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".eur_2_year", function () {
				chart.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".eur_1_year", function () {
				chart.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".eur_1_month", function () {
				chart.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".eur_1_week", function () {
				chart.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".eur_1_day", function () {
				chart.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".eur").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			


			$(document).on("click", ".jpy_10_year", function () {
				chart2.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".jpy_5_year", function () {
				chart2.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".jpy_2_year", function () {
				chart2.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".jpy_1_year", function () {
				chart2.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".jpy_1_month", function () {
				chart2.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".jpy_1_week", function () {
				chart2.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".jpy_1_day", function () {
				chart2.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".jpy").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			



			


			$(document).on("click", ".gbp_10_year", function () {
				chart3.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".gbp_5_year", function () {
				chart3.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".gbp_2_year", function () {
				chart3.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".gbp_1_year", function () {
				chart3.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".gbp_1_month", function () {
				chart3.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".gbp_1_week", function () {
				chart3.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".gbp_1_day", function () {
				chart3.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".gbp").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			





			


			$(document).on("click", ".chf_10_year", function () {
				chart4.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".chf_5_year", function () {
				chart4.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".chf_2_year", function () {
				chart4.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".chf_1_year", function () {
				chart4.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".chf_1_month", function () {
				chart4.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".chf_1_week", function () {
				chart4.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".chf_1_day", function () {
				chart4.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".chf").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			





			


			$(document).on("click", ".nzd_10_year", function () {
				chart5.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".nzd_5_year", function () {
				chart5.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".nzd_2_year", function () {
				chart5.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nzd_1_year", function () {
				chart5.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".nzd_1_month", function () {
				chart5.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nzd_1_week", function () {
				chart5.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nzd_1_day", function () {
				chart5.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".nzd").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			


			


			$(document).on("click", ".nok_10_year", function () {
				chart6.zoomX(new Date(day + ' ' + month + ' ' + (year - 10)).getTime(), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".nok_5_year", function () {
				chart6.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".nok_2_year", function () {
				chart6.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nok_1_year", function () {
				chart6.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".nok_1_month", function () {
				chart6.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nok_1_week", function () {
				chart6.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".nok_1_day", function () {
				chart6.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".nok").removeClass("chart-active");
				$(this).addClass('chart-active');
			});





			$(document).on("click", ".naturalGas_10_year", function () {
				chart7.zoomX(new Date(day + ' ' + month + ' ' + (year - 9)).getTime(), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".naturalGas_5_year", function () {
				chart7.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".naturalGas_2_year", function () {

				chart7.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".naturalGas_1_year", function () {
				chart7.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".naturalGas_1_month", function () {
				chart7.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".naturalGas_1_week", function () {
				chart7.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".naturalGas_1_day", function () {
				chart7.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".naturalGas").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			var chart = new ApexCharts(document.querySelector("#chart-timeline"), options1);
			var chart2 = new ApexCharts(document.querySelector("#chart-timeline2"), options2);
			var chart3 = new ApexCharts(document.querySelector("#chart-timeline3"), options3);
			var chart4 = new ApexCharts(document.querySelector("#chart-timeline4"), options4);
			var chart5 = new ApexCharts(document.querySelector("#chart-timeline5"), options5);
			var chart6 = new ApexCharts(document.querySelector("#chart-timeline6"), options6);
			var chart7 = new ApexCharts(document.querySelector("#chart-timeline7"), options7);
			var chart8 = new ApexCharts(document.querySelector("#chart-timeline8"), options8);
			
			setTimeout(() => {
				
	
				let unixConvertgas = new Date(datagas[datagas.length-1][0]).toLocaleDateString();
				$("#naturalGas_title").html(`1 MMBTU = ${datagas[datagas.length-1][1]} $ (son yenilənmə ${unixConvertgas})`);
				
				let unixConvertoil = new Date(databrent[databrent.length-1][0]).toLocaleDateString();
				$("#oil_title").html(`1 Barel = ${databrent[databrent.length-1][1]} $ (son yenilənmə ${unixConvertoil})`);
				
				chart.render();
				$(".eur_1_month").click();

				chart2.render();
				$(".jpy_1_month").click();

				chart3.render();
				$(".gbp_1_month").click();

				chart4.render();
				$(".chf_1_month").click();

				chart5.render();
				$(".nzd_1_month").click();

				chart6.render();
				$(".nok_1_month").click();

				chart7.render();
				$(".naturalGas_1_month").click();

				chart8.render();
				$(".oil_1_month").click();
				
				
			}, 100);
			

			


			$(document).on("click", ".oil_10_year", function () {
				chart8.zoomX(new Date(day + ' ' + month + ' ' + (year - 9)).getTime(), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".oil_5_year", function () {
				chart8.zoomX(new Date(day + ' ' + month + ' ' + (year - 5)).getTime(), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			$(document).on("click", ".oil_2_year", function () {

				chart8.zoomX(new Date(day + ' ' + month + ' ' + (year - 2)).getTime(), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".oil_1_year", function () {
				chart8.zoomX(new Date(day + ' ' + month + ' ' + (year - 1)).getTime(), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});
			
			$(document).on("click", ".oil_1_month", function () {
				chart8.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-2592000*1000), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".oil_1_week", function () {
				chart8.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-604800*1000), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			$(document).on("click", ".oil_1_day", function () {
				chart8.zoomX((new Date(day + ' ' + month + ' ' + year).getTime()-86400*1000), new Date().getTime());
				$(".oil").removeClass("chart-active");
				$(this).addClass('chart-active');
			});

			
		});

		Date.prototype.monthNames = [
			"January", "February", "March",
			"April", "May", "June",
			"July", "August", "September",
			"October", "November", "December"
		];

		Date.prototype.getMonthName = function () {
			return this.monthNames[this.getMonth()];
		};
		Date.prototype.getShortMonthName = function () {
			return this.getMonthName().substr(0, 3);
		};


		
	</script>

</body>

</html>
