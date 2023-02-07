<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

require("../config/db.php");
require("../config/login_status.php");

ob_start();
error_reporting(0);


switch($_GET['case'])
{
case 'add':

    $arr_opt  =$_GET['arr_opt'];

    $stmt = $connect->prepare("INSERT INTO authority SET `company_type` = ?, `status` = ?, base_level = ?, 1c_base = ?, fullname = ?, `login` = ?, position_type = ?, g_status = ?");
    $stmt->bind_param("sssssssi",
    $_POST['company_type'],
    $_POST['status'],
    $arr_opt,
    $_POST['1c_base'],
    $_POST['fullname'],
    $_POST['login'],
    $_POST['position_type'],
    $_POST['g_status']
    );
    if($stmt->execute()) $data['status'] = 1; else $data['status'] = 0;
    $stmt->close();
    $connect->close();
    echo json_encode($data);

break;


case 'edit':

    $arr_opted  = $_GET['arr_opt'];


    $mtst = $connect->query("SELECT position_type, g_status,login FROM authority WHERE id = '".$_GET['uid']."'")->fetch_assoc();
    
 

    $update = $connect->query("UPDATE authority SET 

    company_type ='".$_POST['company_type']."',
    status ='".$_POST['status']."',
    base_level ='".$arr_opted."',
    1c_base ='".$_POST['1c_base']."',
    fullname ='".$_POST['u_name']."',
    login ='".$_POST['u_username']."',
    position_type ='".$_POST['position_type']."',
    sts = '1',
    g_status ='".$_POST['g_status']."'  
    

     WHERE id = '".$_GET['uid']."'");

     

    if($update)
    {
        $data['status'] = 1; 
        

        if($_POST['g_status']==1){
            $g_sts_post = "Açıq";
        }else{
            $g_sts_post = "Qapalı";
        }

        if($mtst['g_status']==1){
            $g_sts_mtst = "Açıq";
        }else{
            $g_sts_mtst = "Qapalı";
        }


      

        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "mail.saraqrup.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = "e-pas@saraqrup.com";
        $mail->Password = "Support_123@@@";
        $mail->setFrom("e-pas@saraqrup.com", "$user_fullname");
        $mail->addAddress("support@amondesoft.com", "");
        $mail->Subject = "1c Səlahiyyət sorğusu";
        $mail->msgHTML("<p> Salam, </p><p>Hörmətli AmondeSoft Əməkdaşları.</p><p>    </p><b>{$user_inf['u_name']}</b> <b>{$user_inf['u_surname']}</b> vəzifəsində olan istifadəçi <b>{$mtst['login']}</b> 1c istifadəçisinin <b>{$mtst['position_type']}</b> səlahiyyətini <b>{$_POST['position_type']}</b> və giriş imkanını <b>{$g_sts_mtst}</b> -dan <b>{$g_sts_post}</b> -a dəyişmək sorğusu göndərib. <p>Zəhmət olmasa göndərilən sorğunu 1c-də dəyişərək sistemdə tapşırığı həll olunmuş kimi qeyd edin.</p><p>    </p><p><b>QEYD:</b> Bu bildiriş elektron sistem tərəfindən göndərilmişdir. Məktuba cavab verməyə ehtiyac yoxdur. </p>");
        $mail->AltBody = 'HTML messaging not supported';

        if(!$mail->send()){
        }else{
            
        }
    }  
    else $data['status'] = 0;  
    

    echo json_encode($data);

break;

case 'T':

    $stmt = $connect->prepare("UPDATE authority SET sts = '2' WHERE id = ?");
    $stmt->bind_param("i",$_GET['uid']);
    if($stmt->execute()) $data['status'] = 1; else $data['status'] = 0;
    $stmt->close();
    $connect->close();
    echo json_encode($data);

break;

}


?>