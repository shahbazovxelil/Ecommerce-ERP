<?php 
session_start();
if(isset($_SESSION['email'])){
    header("Location: index.php");
    exit;}


 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Fitolab" name="description">
    <meta content="LIB" name="author">
    <meta name="keywords" content="Fitolab, Lib">

    <!-- Title -->
    <title>Login</title>

    <!--Favicon -->
    <link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon" />

    <!---Icons css-->
	<link href="assets/css/icons.css" rel="stylesheet" />

    <!--Bootstrap css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>
    <div class="login-box">
        <h2 class="test mb-5">Daxil olun</h2>
        <form class="needs-validation form" novalidate>
            <div class="user-box mb-5">
                <input type="email" name="u_corp_email" required="" class="mb-0 login_inp" autocomplate="off">
                <div class="invalid-feedback">Xana boş ola bilməz! </div>
                <label>E-poçt ünvan</label>
            </div>
            <div class="user-box mb-3 position-relarive" id="Password-toggle1">
                <a href="" class="position-absolute">
                    <i class="fe fe-eye" aria-hidden="true"></i>
                </a>
                <input type="password" name="u_password" required="" class="mb-0 password_inp">
                <div id="error" class="invalid-feedback">Xana boş ola bilməz! </div>
                <label>Şifrə</label>
            </div>
            <div class="form-group ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-white" for="flexCheckDefault">
                        Şifrəni yadda saxla
                    </label>
                </div>
            </div>
            <button id="submit" class="btn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Daxil ol
            </button>
        </form>
    </div>
    <!-- Jquery js-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="custom_js/login.js"></script>
	<!--Form Validations js-->
	<script src="assets/js/form-vallidations.js"></script>
    <!-- Show Password -->
	<script src="assets/js/bootstrap-show-password.min.js"></script>
</body>

</html>