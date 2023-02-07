<?php
require("../config/db.php");
session_start();
ob_start();
error_reporting(0);
//user add
if ($_GET['tab']=="add_user") {

          



    $arrkey = array();
    $arrval = array();
                $uploadOk = 1;
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['u_profile_img']["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $random_image_name = $target_dir . date("Y_d_m_H_i_s").".".$imageFileType;
    
                $arrkey[] = "u_profile_img";
                $arrval[] = $random_image_name;
                // Allow certain file formats
    
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
                    {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }
    
                if ($uploadOk == 1)
                {
                    if (move_uploaded_file($_FILES['u_profile_img']["tmp_name"], $random_image_name))
                        {
                            //echo "The file ". $random_image_name. " has been uploaded.";
    
                        } 
                        else 
                        {
                            echo "Sorry, there was an error uploading your file.";
                        }
                }
            
    
     parse_str($_POST['user_info'],$xx);
    
     $xx['u_password']=md5($xx['u_password']);
     $u_company= $_POST['not_to_whom'];
     
    
    foreach ($xx as $key => $value) {
        
    $arrkey[] = $key;
    $arrval[] = $value;
    
    }    
    
        $impName = implode(',',$arrkey);
        $impValue = implode("','",$arrval);


    
     $ins = $connect->query("INSERT INTO users  (".$impName.",u_company) VALUES ('".$impValue."','".$u_company."')");
    
    
     if($ins){
        echo json_encode(['status'=>1]);

    }else{
        echo json_encode(['status'=>0]);
    }
    
    
    }


//user edit
    //update etmek ucun

if ($_GET['tab']=="edit_user") {

    $arrkey1 = array();
    $arrval1 = array();
                $uploadOk = 1;
                $target_dir = "uploads/";

                $target_file = $target_dir . basename($_FILES['u_profile_img']["name"]);

                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $random_image_name = $target_dir . date("Y_d_m_H_i_s").".".$imageFileType;
    
                $arrkey1[] = "u_profile_img";
                $arrval1[] = $random_image_name;
                // Allow certain file formats
                $uid =base64_decode($_GET['uid']);
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
                    {
                    
                    $uploadOk = 0;
                    }

                            if ($uploadOk == 1)
                            {
                                if (move_uploaded_file($_FILES['u_profile_img']["tmp_name"], $random_image_name))
                                    {
                                      

                                               mysqli_query($connect,"UPDATE users SET 
                                                u_profile_img ='".$random_image_name."'
                                 
                                            
                                            
                                                 WHERE id = '".$uid."'");


                                    } 
                                
                            }
            
    
     parse_str($_POST['user_info'],$yy);
     $yy['u_password']=md5($yy['u_password']);

     $u_company= $_POST['not_to_whom'];
    

        
    $upd = mysqli_query($connect,"UPDATE users SET 
        u_name ='".$yy['u_name']."',
        u_surname ='".$yy['u_surname']."',
        u_father_name ='".$yy['u_father_name']."',
        u_corp_email ='".$yy['u_corp_email']."',
        u_company ='".$u_company."',
        u_position ='".$yy['u_position']."',
        u_password ='".$yy['u_password']."',
        u_status ='".$yy['u_status']."'
        
    
         WHERE id = '".$uid."'");
    
    if($upd){
        echo json_encode(['status'=>1]);

    }else{
        echo json_encode(['status'=>0]);
    }
       
    
    
    
    
    }


    if($_GET['tab'] == "del_user"){

        $del_user_id = $connect->real_escape_string(htmlentities($_GET['del_user_id']));     
      $del_user = $connect->query("DELETE FROM users WHERE id='".$del_user_id."'");
  
  
      if(!$del_user) echo  $connect->error; else echo "del_user";
  
  }



?>