<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    include "../databases/database.classes.php";
    include "../classes/register.classes.php";
    include "../controller/register-contr.php";

    $register =  new RegisterContr($email, $pwd, $pwdRepeat);

    $register->registerUser();

    header("location: ../views/AddDetails.php?error=none");
}
