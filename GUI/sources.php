<?php
session_start();
include("../DAO/Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');
if(!isset($_SESSION['rol'])){
    header("Location: ../GUI/login.php");
} else {
    if($_SESSION['rol'] != 2){
        header("Location: ../GUI/categories.php");
    }
}

include("../includes/header.php");
?>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-10">
            <h2>Recursos de Noticias</h2>
            <hr class="my-4">
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
                    $id_user = $_SESSION['id_user'];
                    $query = "SELECT * FROM news_sources a INNER JOIN categories b ON a.id_category = b.id WHERE (a.id_user = '$id_user') AND (a.enabled = 1)";
                    $result = $db->getMySQLConnection()->query($query);
                    while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td> <?php echo $row[2] ?></td>
                            <td> <?php echo $row[7] ?></td>
                            <td>
                                <a href="crud_sources.php?id=<?php echo $row[0]?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                <a href="../DAO/bd_source.php?id=<?php echo $row[0]?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="crud_sources.php">
                <div class="col-lg-3 justify-content-start pt-2">
                    <button class="btn btn-lg btn-info btn-block text-uppercase mt-5 mb-5" type="submit">Agregar Nuevo</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../includes/footer.php")?>
