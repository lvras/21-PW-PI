<?php
session_start();
include("../DAO/Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');

if(!isset($_SESSION['rol'])){
    header("Location: ../GUI/login.php");
} else {
    if($_SESSION['rol'] != 1){
        header("Location: ../GUI/news.php");
    }
}
include("../includes/header.php");
?>
<div class="container mt-5">
    <div class="row justify-content-around">
        <div class="col-8">
            <h2>Nueva categoria</h2>
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
            <?php if (isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "SELECT * FROM categories WHERE id = $id";
                        $result = $db->getMySQLConnection()->query($query);
                        if (mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_array($result);
                            $name = $row['name'];
                        }
                        ?>
                            <form class="pt-3" method="POST" action="../DAO/bd_category.php?id=<?php echo $id?>">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>"  placeholder="Actualizar nombre" required autofocus>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 justify-content-start pt-5">
                                    <hr class=" mt-5">
                                        <button class="btn btn-lg btn-info btn-block text-uppercase mt-2" name="update_category" type="submit">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                    } else {
                        ?>
                            <form class="pt-3" method="POST" action="../DAO/bd_category.php">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" required autofocus>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 justify-content-start pt-5">
                                    <hr class=" mt-5">
                                        <button class="btn btn-lg btn-info btn-block text-uppercase mt-2" name="save_category" type="submit">Agregar Nuevo</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                    }
            ?>
        </div>
    </div>
</div>
<?php include("../includes/footer.php")?>