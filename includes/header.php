<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="shortcut icon" href="../img/Favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div id="wrap">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand">
            <img src="../img/logo.png" width="40" height="40" alt="">
            </a>
            <div class="dropdown show">
                <a class="btn btn-info dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php if($_SESSION['rol'] == 1){ ?>
                    <a class="dropdown-item" href="categories.php">Categorias</a>
                    <a class="dropdown-item" href="#">Actualizar noticias</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php?out=-1">Cerrar sesion</a>
                <?php } else if ($_SESSION['rol'] == 2){ ?>
                    <a class="dropdown-item" href="sources.php">Recursos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php?out=-1">Cerrar sesion</a>
                <?php } ?>
            </div>
            </div>
        </div>
    </nav>