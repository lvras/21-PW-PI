<?php
session_start();
include("Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');

if(isset($_POST['save_category'])){
    $name = $_POST['name'];

    $query = "INSERT INTO categories(name, enabled) VALUES('$name', true)";
    $result = $db->getMySQLConnection()->query($query);
    if(!$result){
        $_SESSION['message'] = 'Fallo en el registro, intente nuevamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/crud_categories.php");
    } else {
        header("Location: ../GUI/categories.php");
    }
}

if(isset($_POST['update_category'])){
    $id = $_GET['id'];
    $name = $_POST['name'];

    $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
    $result = $db->getMySQLConnection()->query($query);
    if(!$result){
        $_SESSION['message'] = 'Fallo en la actualizacion, intente nuevamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/crud_categories.php");
    } else {
        header("Location: ../GUI/categories.php");
    }
}

if (isset($_GET['id'])){
    if(isset($_POST['update_category'])){

    } else {
        $id = $_GET['id'];
        $query = "UPDATE categories SET enabled = false WHERE id = '$id'";
        $result = $db->getMySQLConnection()->query($query);
        if(!$result){
            $_SESSION['message'] = 'Fallo en la eliminacion, intente nuevamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../GUI/categories.php");
        } else {
            header("Location: ../GUI/categories.php");
        }
    }
}