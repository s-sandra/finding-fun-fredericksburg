<?php
    $page_title = "Log Out";
    include("header.php");
?>

<?php
session_start();
if(session_destroy()){
    header("Location: login.php"); //redirects to login page
}
    ?>

<?php
    include("footer.php");
?>