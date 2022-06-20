<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $is_admin = 'yes';


    include '../databases/database.classes.php';
    include '../classes/adminLogin.classes.php';
    include '../controller/adminLogin-contr.php';

    $adminUser = new AdminLoginContr($email, $pwd);
    $adminUser->AdminLogin();

    header("location: /cio-points-web-app/Admin/views/admin-dashboard.php?status=AdminLoginSuccess");
}
