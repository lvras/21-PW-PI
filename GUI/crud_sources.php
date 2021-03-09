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
        <div class="col-8">
            <h2>Nuevo recurso de noticia</h2>
            <hr class="my-4">
            <form class="pt-3" method="POST" action="">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="url" class="form-control" placeholder="RSS URLS" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="categorie" aria-label="Default select example">
                        <option selected disable>Seleccione una categoria</option>
                        <?php
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 justify-content-start">
                    <hr class=" mt-5">
                        <button class="btn btn-lg btn-info btn-block text-uppercase mt-2" type="submit">Agregar Nuevo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../includes/footer.php")?>