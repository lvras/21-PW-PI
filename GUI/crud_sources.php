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
        <div class="col-8">
            <h2>Nuevo recurso de noticia</h2>
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
            <?php if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "SELECT * FROM news_sources WHERE id = $id";
                        $result = $db->getMySQLConnection()->query($query);
                        if (mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_array($result);
                            $name = $row['name'];
                            $url = $row['url'];
                        }
                        ?>
                        <form class="pt-3" method="POST" action="../DAO/bd_source.php?id=<?php echo $id?>">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Actualizar nombre" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="url" class="form-control" value="<?php echo $url;?>" placeholder="Actulizar RSS" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category" aria-label="Default select example">
                                    <?php
                                    $id_category = $row['id_category'];
                                    $query = "SELECT * FROM categories";
                                    $result = $db->getMySQLConnection()->query($query);
                                    while($row = mysqli_fetch_array($result)){
                                        if($row['id'] == $id_category){?>
                                            <option value="<?php echo $row['id']?>"selected><?php echo $row['name']?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 justify-content-start">
                                <hr class=" mt-5">
                                    <button class="btn btn-lg btn-info btn-block text-uppercase mt-2" name="update_source" type="submit">Actualizar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <form class="pt-3" method="POST" action="../DAO/bd_source.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="url" class="form-control" placeholder="RSS URL" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category" aria-label="Default select example">
                                    <option selected disabled>Seleccione una categoria</option>
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $result = $db->getMySQLConnection()->query($query);
                                    while($row = mysqli_fetch_array($result)){ ?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 justify-content-start">
                                <hr class=" mt-5">
                                    <button class="btn btn-lg btn-info btn-block text-uppercase mt-2" name="save_source" type="submit">Agregar Nuevo</button>
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