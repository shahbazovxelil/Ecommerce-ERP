<?php
require("../config/db.php");
session_start();
ob_start();
error_reporting(0);
	//login
	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$passwordmd5=md5($password);
		$check = $connect->query("select * from users where u_corp_email='$email' and u_password='$passwordmd5'");
		$row = $check->fetch_assoc();
		$id = $row['id'];
		if (mysqli_num_rows($check) > 0)
		{	
			if ($row['u_status'] ==1)
				{
		
			$_SESSION['my_user_id']=$id;
			$_SESSION['email']=$email;
			$_SESSION['password']=$passwordmd5;



			$data['status'] = 1;

		}

		else { $data['status'] = 2; }

	}

		else {
		   			
			$data['status'] = 0;
				
		}


	echo json_encode($data);

		
	}

	if($_GET['tab'] == "logout")
	{

		if(session_destroy()) $data['status'] = 1; else $data['status'] = 0;
		echo json_encode($data);
	}

	
?>