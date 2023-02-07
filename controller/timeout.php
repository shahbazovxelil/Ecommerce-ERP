<?php
require("../config/db.php");
session_start();
ob_start();
error_reporting(0);

if($_GET["tab"]=="logout_timeout"){

 $san = $_GET['san'];
if(isset($san)){

session_start();
session_unset();
session_destroy();
header('location: login.php');

echo $san;

}




}

















?>