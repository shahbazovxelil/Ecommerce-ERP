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
//bank add


$positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru"];
if ($_GET['tab']=="add_bank") {
    $sql = $connect->query("TRUNCATE banks");

    for($i = 0; $i < count($_POST['name']); $i++)
    {	
        $sql = $connect->query("INSERT INTO banks SET name = '".$_POST['name'][$i]."'");		
    }


    if($sql)
    {
        $data['status'] = "1"; 
    }
    else
    {
        $data['status'] = "0";	
    }
    echo json_encode($data);

}

if ($_GET['tab']=="add_branch") {

    $sql = $connect->query("DELETE  FROM bank_branches WHERE bank_id = '".$_POST['bank_name']."'");



    for($i = 0; $i < count($_POST['name1']); $i++)
    {	
        $sql = $connect->query("INSERT INTO bank_branches SET bank_id = '".$_POST['bank_name']."',bank_branch_name = '".$_POST['name1'][$i]."'");		
    }


    if($sql)
    {
        $data['status'] = "1"; 
    }
    else
    {
        $data['status'] = "0";	
    }
    echo json_encode($data);

}



if ($_GET['tab']=="bank_select") {

  

$sql = $connect->query("SELECT * FROM bank_branches WHERE bank_id = {$_POST['uid']}")->fetch_all(MYSQLI_ASSOC);




if($sql)
{
    $data['status'] = "1"; 
    $data['result'] = $sql;
}
else
{
    $data['status'] = "0";	
}
echo json_encode($data);


}



if ($_GET['tab']=="bank_select2") {  

    $sql_1 = $connect->query("SELECT * FROM bank_branches WHERE bank_id = {$_POST['uid']}")->fetch_all(MYSQLI_ASSOC);   
    
    
    if($sql_1)
    {
        $data['status'] = "1"; 
        $data['result'] = $sql_1;
    }
    else
    {
        $data['status'] = "0";	
    }
    echo json_encode($data);
    
    
    }

    if ($_GET['tab']=="add_payment") {

        $date = date("d.m.Y");
        $date2 = date("d.m.Y H:i:s");
        $user_id = $user_inf['id'];
        if($user_inf['u_position']=="Holdingin Baş Maliyyə Auditoru")
    {
        $conf_json = '[["'.$user_id.'"],["'.$date.'"],["1"],[]]';
        $json = '[["'.$user_id.'"],["'.$date.'"]]';
    } 
    else
    {
        $conf_json = '[[],[],["2"],[]]';
        $json = '[[],[]]';
    }

    

    if($user_inf['u_position']=="Holdingin Baş Maliyyə Auditoru"){
        $sts = 1;
    }else{
        $sts = 0;
    }
            $sql = $connect->query("INSERT INTO payment_document SET 
            
            appointment = '".$_POST['appointment']."',
             unit_measure = '".$_POST['unit_measure']."',
             quantity = '".$_POST['quantity']."',
             price = '".$_POST['price']."',
             currency = '".$_POST['currency']."',
             total_amount = '".$_POST['total_amount']."',
             payment_type = '".$_POST['payment_type']."',
             bank_name = '".$_POST['bank_name']."',
             bank_branch = '".$_POST['bank_branch']."',
             company_name = '".$_POST['company_name']."',
             note = '".$_POST['note']."' ,  
             confirmation_id = '$conf_json',
             see_status = '$json', 
             author_id = '$user_inf[id]' ,
             status = '$sts'  
            
            
            ");		
    
    
        if($sql)
        {

            $log_date_add = date("d.m.Y H:i:s");

            $logs = $connect->query("INSERT INTO logs SET 
            executor_id = '".$user_inf['id']."', log_description = 'Ödəniş sənədi yaratdı',log_created_time = '".$log_date_add."',
            log_appointment='".$_POST['appointment']."'");

            $data['status'] = "1"; 
            $users_list = $connect->query("SELECT * FROM users WHERE (u_position = 'Holdingin Baş Kassiri' OR u_position = 'Holdingin Maliyyə Direktorunun köməkçisi' OR u_position = 'Holdingin Maliyyə Direktoru' OR u_position = 'Holdingin Baş Maliyyə Auditoru' OR u_position = 'Admin') AND email != ''")->fetch_all(MYSQLI_ASSOC);
            foreach($users_list as $userslist)
            {
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
                $mail->addAddress($userslist['email'], "");
                $mail->Subject = "Sənəd üçün təsdiq sorğusu";
                // $mail->msgHTML("<b>$date2</b> tarixində <b>$document_name</b> adlı sənəd <b>{$user_inf['u_name']} {$user_inf['u_surname']}</b> tərəfindən yaradıldı");
                $mail->msgHTML("<p> Salam, </p><p>Hörmətli Holding Əməkdaşları.</p><p>    </p><p><b>{$_POST['company_name']}</b>-nin  əməkdaşı <b>{$user_inf['u_name']} {$user_inf['u_surname']}</b> tərəfindən sistemə ödəniş sənədi daxil edilmişdir.</p><p>Sənədin adı: <b>{$_POST['appointment']}.</b></p><p>Sənədin sistemə daxil edilmə tarixi: <b>$date2.</b></p><p>Miqdar: <b>{$_POST['quantity']}.</b></p><p>Yekun Məbləğ: <b>{$_POST['total_amount']}.</b></p><p>    </p><p>Zəhmət olmasa sistemə daxil olaraq, həmin sənədlə tanış olardınız.</p><p>    </p><p><b>QEYD:</b> Bu bildiriş elektron sistem tərəfindən göndərilmişdir. Məktuba cavab verməyə ehtiyac yoxdur. </p><p>Bu bildiriş sistemdə öz əksini tapmazsa və ya bildiriş məlumatları səhv olarsa, zəhmət olmasa bununla bağlı support@amondesoft.com elektron poçt ünvanına məlumat verərdiniz.</p>");
                $mail->AltBody = 'HTML messaging not supported';
                //$mail->addAttachment($result['img_name']); //Attach an image file
    
                if(!$mail->send()){
                    //echo "Mailer Error: " . $mail->ErrorInfo;
                    //$data['status'] = 0;
                }else{
                    //$data['status'] = 1;
                    
                }
    
            }
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }




    if ($_GET['tab']=="edit_payment") {

        $document_id = $connect->real_escape_string(htmlentities($_GET['uid']));  

            $sql = $connect->query("UPDATE payment_document SET 
            
             appointment = '".$_POST['appointment']."',
             unit_measure = '".$_POST['unit_measure']."',
             quantity = '".$_POST['quantity']."',
             price = '".$_POST['price']."',
             currency = '".$_POST['currency']."',
             total_amount = '".$_POST['total_amount']."',
             payment_type = '".$_POST['payment_type']."',
             bank_name = '".$_POST['bank_name']."',
             bank_branch = '".$_POST['bank_branch']."',
             company_name = '".$_POST['company_name']."',
             note = '".$_POST['note']."'  WHERE id={$document_id}  ");		
    
    
        if($sql)
        {


            $log_date_edit = date("d.m.Y H:i:s");

            $logs = $connect->query("INSERT INTO logs SET 
              executor_id = '".$user_inf['id']."', log_description = 'Ödəniş sənədində düzəliş etdi',log_created_time = '".$log_date_edit."',
              log_appointment='".$_POST['appointment']."',document_id='".$document_id."'");

            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    if ($_GET['tab']=="add_unit") {
        $sql = $connect->query("TRUNCATE unit_measure");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO unit_measure SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    
    if ($_GET['tab']=="add_document_type_data") {
        $sql = $connect->query("TRUNCATE document_type_data");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO document_type_data SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    if ($_GET['tab']=="add_company") {
        $sql = $connect->query("TRUNCATE company_name");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO company_name SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    if ($_GET['tab']=="add_authority_company") {
        $sql = $connect->query("TRUNCATE authority_company");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO authority_company SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    if ($_GET['tab']=="add_type_authority_data") {
        $sql = $connect->query("TRUNCATE type_authority_data");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO type_authority_data SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }
    

    if ($_GET['tab']=="add_currency") {
        $sql = $connect->query("TRUNCATE currency");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO currency SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }

    if ($_GET['tab']=="add_payment_type") {
        $sql = $connect->query("TRUNCATE payment_type");
    
        for($i = 0; $i < count($_POST['name']); $i++)
        {	
            $sql = $connect->query("INSERT INTO payment_type SET name = '".$_POST['name'][$i]."'");		
        }
    
    
        if($sql)
        {
            $data['status'] = "1"; 
        }
        else
        {
            $data['status'] = "0";	
        }
        echo json_encode($data);
    
    }


    if ($_GET['tab']=="del_audi") {

    
        $del_id = $connect->real_escape_string(htmlentities($_GET['del_id']));     
        $del_audi = $connect->query("DELETE FROM authority WHERE id='".$del_id."'");
    
    
        if($del_audi)
        { 
            

            $data['status'] = 1; 
        }                            
        else{
            $data['status'] = 0;
        }
        echo json_encode($data);
      }


?>