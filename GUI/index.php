<?php
session_start();
include("../DAO/Connection.php");
$db = new DbConnection('127.0.0.1', 'root', '', 'news_proyect');
if(!isset($_SESSION['rol'])){
    header("Location: ../GUI/login.php");
}

include("../includes/header.php");
?>
<section>
    <div class="container mt-3 mb-3">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <?php
                $query = "SELECT * FROM categories WHERE enabled = 1";
                $result = $db->getMySQLConnection()->query($query);
                while($row = mysqli_fetch_array($result)){ ?>
                    <a href="index.php?id=<?php echo $row['id']?>"  class="btn btn-success ml-4 my-2 my-sm-0"><?php echo $row['name']?></a>
                <?php } ?>
            </form>
        </nav>
        <div class="row">
            <?php
            $id_user = $_SESSION['id_user'];
            if(isset($_GET['id'])){
                $id_category = $_GET['id'];
                $query = "SELECT * FROM news WHERE enabled = 1 and id_user = '$id_user' and id_category = '$id_category'";
                $result = $db->getMySQLConnection()->query($query);
                while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-sm-4 mt-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row[1]?></h5>
                                <p class="card-text"><?php echo $row[2]?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $row[4]?></small></p>
                                <a href="<?php echo $row[3]?>" class="btn btn-primary">Link</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <?php
                $query = "SELECT * FROM news WHERE enabled = 1 and id_user = '$id_user'";
                $result = $db->getMySQLConnection()->query($query);
                while($row = mysqli_fetch_array($result)){ ?>
                    <div class="col-sm-4 mt-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row[1]?></h5>
                                <p class="card-text"><?php echo $row[2]?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $row[4]?></small></p>
                                <a href="<?php echo $row[3]?>" class="btn btn-primary">Link</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php include("../includes/footer.php")?>