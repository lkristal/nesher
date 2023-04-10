<!DOCTYPE html>
<html lang="en">
    <?php include "head.php" ?>
<body>
    <?php
        if (!isset($_GET["category_id"])) {
            exit("category id is not present in URL");
        }
        $id = $_GET["category_id"];
        switch ($id)
        {
            case 1:
                $detalle = "detalle2.php";
                $innerid = "primary_image_id";               
                break;
            case 8:
                $detalle = "videos.php";
                $innerid = "list_image_id";               
                break;
            default:
                $detalle = "detalle.php";
                $innerid = "list_image_id";               
                break;
        }
    ?>

    <header>
		 <?php include "menu.php" ?>
    </header>
    <!-- Titulo de la Categoria -->
    
    <!-- Productos de la Categoria -->
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT name, description, slug,  images.path from products inner join images on images.id = products.". $innerid ." where products.deleted_at is null AND category_id=".$id;
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) { ?> 
                    <div class="col-12 col-md-4">
                        <div class="card m-2 bg-dark bg-opacity-25">
                            <img class="card-img-top" class="w-100" src="images/<?=$row["path"] ?>" alt="<?=$row["name"] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?=$row["name"] ?></h5>
                                <a href="<?=$detalle ?>?slug=<?=$row["slug"] ?>" class="btn btn-primary">Ver Mas</a>
                            </div>
                            </div>
                    </div>
                <?php
                }
                $result->free();
            } ?>
        </div>
    </div>
<?php include "footer.php" ?>