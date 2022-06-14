<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    include '../databases/database.classes.php';
    include '../classes/UserLogin.classes.php';
    include '../controller/UserLogin-contr.php';

    $userLogin = new UserLoginContr($email, $pwd);

    $userLogin->UserLogin();

    header("location: /cio-points-web-app/User/views/user-dashboard.php?status=LoginSuccess");
}
