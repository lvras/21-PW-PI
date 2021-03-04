<?php



include("../includes/header.php");
?>
<section>
    <div class="container mt-3 mb-3">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Registro de usuario</h2>
                        <hr class="my-4">
                        <form class="pt-3" method="POST" action="">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Apellido" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" requireda>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-info btn-block text-uppercase mt-5" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div
            </div>
        </div>
    </div>
</section>
<?php include("../includes/footer.php")?>