<?php
session_start();
include("Connection.php");
include("bd_RSS.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');

if(isset($_POST['save_source'])){
    $url = $_POST['url'];
    $name = $_POST['name'];
    $id_category = $_POST['category'];
    $id_user = $_SESSION['id_user'];
    if(validateURL($url)){
        $query = "INSERT INTO news_sources(url, name, enabled, id_category, id_user) VALUES('$url', '$name', true, '$id_category', '$id_user')";
        $result = $db->getMySQLConnection()->query($query);
        $id_news_source = $db->getMySQLConnection()->insert_id;
        if(!$result){
            $_SESSION['message'] = 'Fallo en el registro, intente nuevamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../GUI/crud_sources.php");
        } else {
            ReedNews($url, $id_news_source, $id_user, $id_category);
            header("Location: ../GUI/sources.php");
        }
    } else {
        $_SESSION['message'] = 'URL invalido';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/crud_sources.php");
    }
}


if(isset($_POST['update_source'])){
    $id = $_GET['id'];
    $url = $_POST['url'];
    $name = $_POST['name'];
    $id_category = $_POST['category'];
    $id_user = $_SESSION['id_user'];
    if(validateURL($url)){
        $query = "UPDATE news_sources SET url = '$url', name = '$name', id_category = '$id_category' WHERE id = '$id'";
        $result = $db->getMySQLConnection()->query($query);
        if(!$result){
            $_SESSION['message'] = 'Fallo en la actualizacion, intente nuevamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../GUI/crud_sources.php");
        } else {
            $queryN = "UPDATE news SET enabled = false WHERE id_news_source = '$id'";
            $resultN = $db->getMySQLConnection()->query($queryN);
            ReedNews($url, $id, $id_user, $id_category);
        }
    } else {
        $_SESSION['message'] = 'URL invalido';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../GUI/crud_sources.php");
    }
}

if (isset($_GET['id'])){
    if(isset($_POST['update_source'])){

    } else {
        $id = $_GET['id'];
        $query = "UPDATE news_sources SET enabled = false WHERE id = '$id'";
        $result = $db->getMySQLConnection()->query($query);
        if(!$result){
            $_SESSION['message'] = 'Fallo en la eliminacion, intente nuevamente';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../GUI/crud_sources.php");
        } else {
            $queryN = "UPDATE news SET enabled = false WHERE id_news_source = '$id'";
            $resultN = $db->getMySQLConnection()->query($queryN);
            header("Location: ../GUI/sources.php");
        }
    }
}

/**
 * Validate that the URL is correct
 */
function validateURL($url){
    $urlparts = parse_url($url);

    $scheme = $urlparts['scheme'];

    if ($scheme === 'https' or $scheme === 'http') {
        return true;
    } else {
        return false;
    }
}