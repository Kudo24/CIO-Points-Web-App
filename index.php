<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIO POINTS WEB APP</title>
</head>

<body>

    <?php

    session_start();
    if (isset($_SESSION['userid'])) {
        header("location: /cio-points-web-app/User/views/user-dashboard.php?status=LoginSuccess"); ?>

    <?php } else { ?>
        <a href="Admin/index.php">Admin</a><br>
        <a href="User/index.php">User</a><br>
        <a href="Register/index.php">Register</a><br>
    <?php } ?>
</body>

</html>