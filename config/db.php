

<?php
error_reporting(0);
date_default_timezone_set('Asia/Baku');
ob_start();
$connect = new mysqli("localhost","root","","ecommerce");
$connect -> set_charset("utf8");
// Check connection
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}


?>