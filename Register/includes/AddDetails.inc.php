<?php

if (isset($_POST['submit'])) {
    $firstname = $_POST['first_name'];
    $middlename = $_POST['middle_name'];
    $lastname = $_POST['last_name'];
    $contact_num = $_POST['contact_num'];
    $address = $_POST['address'];

    include "../databases/database.classes.php";
    include "../classes/AddDetails.classes.php";
    include "../controller/AddDetails.contr.php";

    $addDetails = new AddDetailsContr($firstname, $middlename, $lastname, $contact_num, $address);

    $addDetails->AddDetails();

    header("location: /cio-points-web-app/User/views/user-dashboard.php?status=LoginSuccess");
}
