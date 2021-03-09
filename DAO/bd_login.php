<?php
session_start();
include("Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $db->getMySQLConnection()->query($query);
    $row = mysqli_fetch_array($result);
    if($row == true){
        $rol = $row['id_role'];
        $_SESSION['rol'] = $rol;
        switch($_SESSION['rol']){
            case 1:
                header("location: ../GUI/categories.php");
                break;
            case 2:
                header("location: ../GUI/sources.php");
                break;
            default:
        }
    } else {
        $_SESSION['message'] = 'Datos incorrectos, intente nuevamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/login.php");
    }
}