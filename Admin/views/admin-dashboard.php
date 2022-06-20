Admin page
<?php


session_start();
if (isset($_SESSION['adminid'])) {


?>

    <a href="#"><?php echo $_SESSION['adminfirstname'] ?></a>

    <a href="/CIO-Points-Web-App/Admin/includes/logout.inc.php">logout</a>



<?php } else {
    header("location:  /cio-points-web-app/index.php?status=NotAdminLogindashboard"); ?>

<?php } ?>