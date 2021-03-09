<?php
session_start();

if(isset($_GET['out'])){
    session_unset();
    session_destroy();
}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header("location: ../GUI/categories.php");
        break;
        case 2:
            // header('location: prueba.php');
            break;
        default:
    }
}

include("../includes/header.php");
?>
<section>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Inicio de sesion</h2>
                        <?php if(isset($_SESSION['message'])) {?>
                            <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php
                        unset($_SESSION['message']);
                        unset($_SESSION['message_type']); } ?>
                        <form class="form-signin mt-5" method="POST" action="../DAO/bd_login.php">
                            <div class="form-label-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            </div>
                            <div class="form-label-group mt-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <button class="btn btn-lg btn-info btn-block text-uppercase mt-4" name="login" type="submit">Iniciar sesion</button>
                            <hr class="my-4">
                            <a href="register.php">No tienes cuenta? Crear una ahora</a>
                        </form>
                    </div>
                </div
            </div>
        </div>
    </div>
</section>
<?php include("../includes/footer.php")?>