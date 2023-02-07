<?php

require("../config/db.php");
require("../config/login_status.php");

ob_start();
error_reporting(0);


switch($_GET['case'])
{
case 'add_email':

    $update = $connect->query("UPDATE users SET email = '{$_POST['email']}' WHERE id = '{$user_inf['id']}'");

    if($update)
    {
        $data["status"] = 1;
    }
    else
    {
        $data["status"] = 0;
    }

echo json_encode($data);
break;

}


?>
