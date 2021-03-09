<?php
session_start();
if(!isset($_SESSION['rol'])){
    header("Location: ../GUI/login.php");
}
include("../includes/header.php");
?>


<?php include("../includes/footer.php")?>