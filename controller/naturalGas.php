<?php
error_reporting(0);

require("../config/db.php");
require("../config/login_status.php");
require("../classes/Apilayer.class.php");

$api = new Apilayer();



switch($_GET['case'])
{


case 'get_gas':
    $span = $_POST['span'];
echo $api->getJson("https://markets.tradingeconomics.com/chart?s=ng1:com&span=$span&securify=new&url=/commodity/natural-gas&AUTH=mMvnau4sSu5wq8P0PtYTDpzBYg525i3UyMbfCfirhqwhIPXU8LIvk1oKgmb3PTju&ohlc=0");

break;

case 'get_oil':
    $span = $_POST['span'];
echo $api->getJson("https://markets.tradingeconomics.com/chart?s=co1:com&span=$span&securify=new&url=/commodity/natural-gas&AUTH=cJBLZLyq%2FVeleyZXy2FxAqeQML%2FokZgZ%2Fzf4vZcBuyuqvlz3LLb%2F%2B7jwDGjL1%2BeZ&ohlc=0");

break;


}
?>