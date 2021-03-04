<?php




include("./includes/header.php");
?>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Inicio de sesion</h2>
                        <!-- <hr class="my-4"> -->
                        <form class="form-signin mt-5" method="POST">
                            <div class="form-label-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                            </div>
                            <div class="form-label-group mt-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <button class="btn btn-lg btn-info btn-block text-uppercase mt-4" type="submit">Iniciar sesion</button>
                            <hr class="my-4">
                            <a href="#">No tienes cuenta? Create una ahora</a>
                        </form>
                    </div>
                </div
            </div>
        </div>
    </div>
</section>
<?php include("./includes/footer.php")?>