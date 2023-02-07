<?php

Class Upload 
{
 
    //public string $tmp_name="";
    //public string $pathname="";

    public function uploadfile($tmp=[], string $path="")
    {
        $imageFileType = strtolower(pathinfo($tmp['name'],PATHINFO_EXTENSION));
        $random_image_name = $path.date("Y_d_m_H_i_s").".".$imageFileType;

        if (move_uploaded_file($tmp['tmp_name'], $random_image_name))
        {
            return ['status'=>'1','img_name'=>$random_image_name];
        } 
        else 
        {
            return false;
        }
        
    }





}



?>