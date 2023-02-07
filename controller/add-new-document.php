<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

require("../config/db.php");
require("../config/login_status.php");
require("../classes/uploadfile.class.php");

ob_start();
error_reporting(0);

$positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru"];

switch($_GET['case'])
{
    case 'add_document':
    parse_str($_POST['form_data']);

    $upload = new Upload();

    $result = $upload->uploadfile($_FILES['document_file'],"documents/");
    $date = date("d.m.Y");
    $date2 = date("d.m.Y H:i:s");
    $user_id = $user_inf['id'];

if($result['status'] == 1)
{
    if(in_array($user_inf['u_position'],$positions))
    {
        $conf_json = '[["'.$user_id.'"],["'.$date.'"],["1"],[]]';
    } 
    else $conf_json = '[[],[],[],[]]';

    $json = '[["'.$user_id.'"],["'.$date.'"]]';
    $insert = $connect->query("INSERT INTO document SET  company_name = '{$company_name}', confirmation_id = '$conf_json', see_status = '$json', author_id = '$user_inf[id]', document_name = '$document_name', document_type = '$document_type', document_important = '$document_important', document_file = '{$result['img_name']}'");
    if($insert)
    {

        $log_date_add = date("d.m.Y H:i:s");

        $logs = $connect->query("INSERT INTO logs SET 
        executor_id = '".$user_inf['id']."', log_description = 'Maliyə sənədi yaratdı',log_created_time = '".$log_date_add."',
        log_appointment='".$_POST['appointment']."'");

        $data['status'] = 1;
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
            $mail->msgHTML("<p> Salam, </p><p>Hörmətli Holding Əməkdaşları.</p><p>    </p><p><b>$company_name</b>-nin  əməkdaşı <b>{$user_inf['u_name']} {$user_inf['u_surname']}</b> tərəfindən sistemə sənəd daxil edilmişdir.</p><p>Sənədin adı: <b>$document_name.</b></p><p>Sənədin sistemə daxil edilmə tarixi: <b>$date2.</b></p><p>Sənədin statusu: <b>$document_important.</b></p><p>    </p><p>Zəhmət olmasa sistemə daxil olaraq, həmin sənədlə tanış olardınız.</p><p>    </p><p><b>QEYD:</b> Bu bildiriş elektron sistem tərəfindən göndərilmişdir. Məktuba cavab verməyə ehtiyac yoxdur. </p><p>Bu bildiriş sistemdə öz əksini tapmazsa və ya bildiriş məlumatları səhv olarsa, zəhmət olmasa bununla bağlı support@amondesoft.com elektron poçt ünvanına məlumat verərdiniz.</p>");
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
    else $data['status'] = 0;
    
}

echo json_encode($data);
break;

case 'add_note':

$update = $connect->query("UPDATE document SET notes = '{$_POST['note']}' WHERE id = '{$_POST['doc_id']}'");

if($update){ $data['status'] = 1; $data['note'] = $_POST['note'];}  else $data['status'] = 0;
echo json_encode($data);

break;

case 'user_list_see':

$users_list = $connect->query("SELECT * FROM users WHERE u_position = 'Holdingin Baş Kassiri' OR u_position = 'Holdingin Maliyyə Direktorunun köməkçisi' OR u_position = 'Holdingin Maliyyə Direktoru' OR u_position = 'Holdingin Baş Maliyyə Auditoru'")->fetch_all(MYSQLI_ASSOC);

$doc = $connect->query("SELECT * FROM document WHERE id = '{$_POST['doc_id']}'")->fetch_assoc();

if($users_list)
{ 
    $data['status'] = 1; 
    $data['users_list'] = $users_list; 
    $data['my_id'] = $user_inf['id'];
    $data['doc'] = $doc;
}

    else
    
    $data['status'] = 0;
echo json_encode($data);

break;

case 'user_see_confirm':
$date = date("d.m.Y");
$user_id = $user_inf['id'];
$update = $connect->query("UPDATE document SET see_status = JSON_ARRAY_INSERT(see_status,'$[0][0]','$user_id','$[1][0]','$date') WHERE id = '{$_POST['doc_id']}'");

if($update)
{ 
    $data['status'] = 1; 

}

    else
    
    $data['status'] = 0;

echo json_encode($data);

break;
        
case 'user_list_confirm':

$users_list = $connect->query("SELECT * FROM users WHERE u_position = 'Holdingin Baş Kassiri' OR u_position = 'Holdingin Maliyyə Direktorunun köməkçisi' OR u_position = 'Holdingin Maliyyə Direktoru' OR u_position = 'Holdingin Baş Maliyyə Auditoru'")->fetch_all(MYSQLI_ASSOC);

$doc = $connect->query("SELECT * FROM document WHERE id = '{$_POST['doc_id']}'")->fetch_assoc();

if($users_list)
{ 
    $data['status'] = 1; 
    $data['users_list'] = $users_list; 
    $data['my_id'] = $user_inf['id'];
    $data['doc'] = $doc;
}

    else
    
    $data['status'] = 0;
echo json_encode($data);

break;

case 'user_confirm_confirm':
$date = date("d.m.Y");
$user_id = $user_inf['id'];
$full_name = $user_inf['u_name']." ".$user_inf['u_surname'];
$update = $connect->query("UPDATE document SET last_confirmation_status = '1', last_confirmation_name = '$full_name', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[0][0]','$user_id','$[1][0]','$date','$[2][0]','1') WHERE id = '{$_POST['doc_id']}'");

if($update)
{ 
    $data['status'] = 1; 

}

    else
    
    $data['status'] = 0;

echo json_encode($data);

break;



//inkar  etme start




case 'user_confirm_cancel':
$date = date("d.m.Y");
$user_id = $user_inf['id'];
$confirmation_cancel_note = $_POST['confirmation_cancel_note'];
$full_name = $user_inf['u_name']." ".$user_inf['u_surname'];
$d_id = $_POST['doc_id'];
$update = $connect->query("UPDATE document SET last_confirmation_status = '2', confirmation_cancel_note = '$confirmation_cancel_note', `user_id` = '$full_name', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[0][0]','$user_id','$[1][0]','$date','$[2][0]','0','$[3][0]','$confirmation_cancel_note') WHERE id = '{$_POST['doc_id']}'");

mysqli_query($connect,"insert into notes (cancel_notes,doc_id,user_id) VALUES('$confirmation_cancel_note','$d_id','$user_id')");


if($update)
{ 
    $data['status'] = 1; 

}
    else
    
    $data['status'] = 0;

echo json_encode($data);

break;

//tesdiq etme start
case 'user_confirm_ok':
$date = date("d.m.Y");
$user_id = $user_inf['id'];
$confirmation_ok_note = $_POST['confirmation_ok_note'];
$full_name = $user_inf['u_name']." ".$user_inf['u_surname'];
$update = $connect->query("UPDATE document SET last_confirmation_status = '2', confirmation_cancel_note = '$confirmation_ok_note', `user_id` = '$full_name', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[0][0]','$user_id','$[1][0]','$date','$[2][0]','1','$[3][0]','$confirmation_ok_note') WHERE id = '{$_POST['doc_id']}'");

if($update)
{ 
    $data['status'] = 1; 

}
    else
    
    $data['status'] = 0;

echo json_encode($data);

break;






case 'add_file':


$upload = new Upload();

$result = $upload->uploadfile($_FILES['file'],"documents/extra_documents/");

if($result['status'] == 1)
{

    $insert = $connect->query("INSERT INTO extra_documents SET file_url = '{$result['img_name']}', doc_id = '{$_POST['doc_id']}',author_id = '{$user_inf['id']}', note = '{$_POST['note']}'");
    if($insert) $data['status'] = 1; else $data['status'] = 0;
}

echo json_encode($data);
break;


case 'upload_see':
$doc_id = $_POST['doc_id'];

$extra_doc = $connect->query("SELECT * FROM users INNER JOIN extra_documents ON users.id = extra_documents.author_id WHERE extra_documents.doc_id = '$doc_id'")->fetch_all(MYSQLI_ASSOC);
if($extra_doc)
{
    $data['status'] = 1;
    $data['result'] = $extra_doc;
}
else
{
    $data['status'] = 0;
}
echo json_encode($data);

break;

case 'cancel_item':
    $doc_id = $_POST['doc_id'];

    $positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru"];

    $doc = $connect->query("SELECT author_id,JSON_EXTRACT(confirmation_id,'$[2]') AS list FROM document WHERE id = '$doc_id'")->fetch_assoc();
    $list = json_decode($doc['list']);
    
    if(in_array("1",$list) && !in_array($user_inf['u_position'],$positions))
    {
        $data['status'] = 2;
        $data['result'] = "Tesdiqlenmish senedi redd etmek olmaz";
    } 
    else
    {
        $extra_doc = $connect->query("UPDATE document SET status = 1 WHERE id = '$doc_id'");
        if($extra_doc)
        {
            $data['status'] = 1;
            
        }
        else
        {
            $data['status'] = 0;
        }
    }

    echo json_encode($data);
    
    break;

    case 'restore':
        $doc_id = $_POST['doc_id'];
        
        $extra_doc = $connect->query("UPDATE document SET status = 0 WHERE id = '$doc_id'");
        if($extra_doc)
        {
            $data['status'] = 1;
            
        }
        else
        {
            $data['status'] = 0;
        }
        echo json_encode($data);
        
        break;

}


?>
