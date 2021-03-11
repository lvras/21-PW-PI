<?php
session_start();
include("Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');

if(isset($_POST['save_user'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $query = "INSERT INTO users(email, password, first_name, last_name, enabled, id_role) VALUES('$email', '$password', '$first_name', '$last_name', true, 2)";
    $result = $db->getMySQLConnection()->query($query);
    $id_user = $db->getMySQLConnection()->insert_id;
    if(!$result){
        $_SESSION['message'] = 'Fallo en el registro, intente nuevamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/register.php");
    } else {
        $_SESSION['id_user'] = $id_user;
        $rol = 2;
        $_SESSION['rol'] = $rol;
        header("Location: ../GUI/index.php");
    }
}