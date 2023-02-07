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
    case 'user_list_see':

        $users_list = $connect->query("SELECT * FROM users WHERE u_position = 'Holdingin Baş Kassiri' OR u_position = 'Holdingin Maliyyə Direktorunun köməkçisi' OR u_position = 'Holdingin Maliyyə Direktoru' OR u_position = 'Holdingin Baş Maliyyə Auditoru'")->fetch_all(MYSQLI_ASSOC);
        
        $doc = $connect->query("SELECT * FROM payment_document WHERE id = '{$_POST['doc_id']}'")->fetch_assoc();
        
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




            case 'user_list_confirm':

                $users_list = $connect->query("SELECT * FROM users WHERE  u_position = 'Holdingin Baş Maliyyə Auditoru'")->fetch_all(MYSQLI_ASSOC);
                
                $doc = $connect->query("SELECT * FROM payment_document WHERE id = '{$_POST['doc_id']}'")->fetch_assoc();
                
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
                    $update = $connect->query("UPDATE payment_document SET last_confirmation_status = '1', last_confirmation_name = '$full_name', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[0][0]','$user_id','$[1][0]','$date','$[2][0]','1') WHERE id = '{$_POST['doc_id']}'");
                    
                    if($update)
                    { 
                        $data['status'] = 1; 
                    
                    }
                    
                        else
                        
                        $data['status'] = 0;
                    
                    echo json_encode($data);
                    
                    break;


                    case 'user_confirm_cancel':
                        $date = date("d.m.Y");
                        $user_id = $user_inf['id'];
                        $confirmation_cancel_note = $_POST['confirmation_cancel_note'];
                        $full_name = $user_inf['u_name']." ".$user_inf['u_surname'];
                        $d_id = $_POST['doc_id'];
                        $update = $connect->query("UPDATE payment_document SET last_confirmation_status = '2', confirmation_cancel_note = '$confirmation_cancel_note',
                         `user_id` = '$full_name', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[0][0]',
                         '$user_id','$[1][0]','$date','$[2][0]','0','$[3][0]','$confirmation_cancel_note') WHERE id = '{$_POST['doc_id']}'");
                        
                        mysqli_query($connect,"insert into notes_payment (cancel_notes,doc_id,user_id) VALUES('$confirmation_cancel_note','$d_id','$user_id')");
                        
                        
                        if($update)
                        { 
                            $data['status'] = 1; 
                        
                        }
                            else
                            
                            $data['status'] = 0;
                        
                        echo json_encode($data);
                        
                        break;



                        case 'user_see_confirm':
                            $date = date("d.m.Y");
                            $user_id = $user_inf['id'];
                            if($user_inf['u_position']=="Holdingin Baş Maliyyə Auditoru"){
                                $sts  ='status=1,';
                            }
                            
                            $update = $connect->query("UPDATE payment_document SET $sts see_status = JSON_ARRAY_INSERT(see_status,'$[0][0]','$user_id','$[1][0]','$date') WHERE id = '{$_POST['doc_id']}'");
                            
                            if($update)
                            { 
                                $data['status'] = 1; 
                            
                            }
                            
                                else
                                
                                $data['status'] = 0;
                            
                            echo json_encode($data);
                            
                            break;

                            case 't_button':

                                $datee = date("d.m.Y H:i:s");
                            
                            
                            
                $update1 = $connect->query("UPDATE payment_document SET   completion_date = '$datee', confirmation_id = JSON_ARRAY_INSERT(confirmation_id,'$[2][0]','3') WHERE id = '{$_POST['doc_id']}'");
                            if($update1)
                            { 
                                $data['status'] = 1; 
                                $log_date_T = date("d.m.Y H:i:s");

                                $logs = $connect->query("INSERT INTO logs SET 
                                  executor_id = '".$user_inf['id']."', log_description = 'Ödəniş sənədində {$_POST['doc_id']} -li sənədi tamamladı',log_created_time = '".$log_date_T."',
                                  document_id='".$_POST['doc_id']."'");

                            }                            
                            else{
                                $data['status'] = 0;
                            }
                                
                                
                            
                            echo json_encode($data);
                            
                            break;

                            case 'del_doc':
                                $doc_del_id = $connect->real_escape_string(htmlentities($_GET['doc_del_id'])); 
                                $positions = ["Holdingin Baş Kassiri","Holdingin Maliyyə Direktorunun köməkçisi","Holdingin Maliyyə Direktoru","Holdingin Baş Maliyyə Auditoru"];
                                
                                $doc = $connect->query("SELECT author_id,JSON_EXTRACT(confirmation_id,'$[2]') AS list FROM payment_document WHERE id = '$doc_del_id'")->fetch_assoc();
                                $list = json_decode($doc['list']);

                                if(in_array("1",$list) && !in_array($user_inf['u_position'],$positions))
                                {
                                    $data['status'] = 2;
                                    
                                } 
                                else
                                {
                                    $del_doc = $connect->query("DELETE FROM payment_document WHERE id='".$doc_del_id."'");
                            
                            
                                    if($del_doc)
                                    { 
                                        $data['status'] = 1; 
                                        $log_date_del = date("d.m.Y H:i:s");

                                        $logs = $connect->query("INSERT INTO logs SET 
                                          executor_id = '".$user_inf['id']."', log_description = 'Ödəniş sənədində {$doc_del_id} -li sənədi sildi',log_created_time = '".$log_date_del."',
                                          document_id='".$doc_del_id."'");
                                    }                            
                                    else{
                                        $data['status'] = 0;
                                    }

                                }
                                    

                                echo json_encode($data);
                            break;

    }





?>