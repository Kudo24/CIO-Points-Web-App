<?php

session_start();
if (isset($_SESSION["userid"])) {


?>

    <a href="#"><?php echo $_SESSION['firstname'] ?></a>
    <a href="/CIO-Points-Web-App/User/includes/logout.inc.php">logout</a>



<?php } else {
    header("location:  /cio-points-web-app/index.php?status=NoUserLogin"); ?>

<?php } ?>