<?php
session_start();
if(!isset($_SESSION['rol'])){
    header("Location: ../GUI/login.php");
} else {
    if($_SESSION['rol'] != 2){
        header("Location: ../GUI/login.php");
    }
}
include("../includes/header.php");
?>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-10">
            <h2>Recursos de Noticias</h2>
            <hr class="my-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                ?>
                </tbody>
            </table>
            <div class="col-lg-3 justify-content-start pt-2">
                <button class="btn btn-lg btn-info btn-block text-uppercase mt-5" type="submit">Agregar Nuevo</button>
            </div>
        </div>
    </div>
</div>
<?php include("../includes/footer.php")?>
