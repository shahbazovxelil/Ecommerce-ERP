<?php 
date_default_timezone_set('Asia/Baku');
require("classes/Apilayer.class.php");

error_reporting(0);
$f = file_get_contents("includes/json.js");

$arr = json_decode($f,1);
$date = date("Y-m-d");
//$date = "2022-06-29";
$apilayer = new Apilayer();

$res = json_decode($apilayer->getData($date,$date),1);

if(!isset($res['quotes'][$date])) $arr['quotes'][$date] = ["AZNEUR" => 0, "AZNJPY" => 0, "AZNGBP" => 0, "AZNCHF" => 0, "AZNNZD" => 0, "AZNNOK" => 0]; else $arr['quotes'][$date] = $res['quotes'][$date];
file_put_contents("includes/json.js",json_encode($arr));



$trading_site = $apilayer->getJson("https://tradingeconomics.com/commodity/natural-gas");
//echo htmlspecialchars($trading_site);
preg_match_all("/TESecurify = '(.*?)'/",$trading_site,$matches);
$auth = $matches[1][1];
$naturalGas = $apilayer->getJson("https://markets.tradingeconomics.com/chart?s=ng1:com&span=9y&securify=new&url=/commodity/natural-gas&AUTH=$auth&ohlc=0");
file_put_contents("includes/naturalGas.js",$naturalGas);
$oil = $apilayer->getJson("https://markets.tradingeconomics.com/chart?s=co1:com&span=9y&securify=new&url=/commodity/natural-gas&AUTH=$auth&ohlc=0");
file_put_contents("includes/oil.js",$oil);
?>