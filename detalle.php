<!DOCTYPE html>
<html lang="en">
    <?php include "head.php" ?>
<body>
    <header>
		 <?php include "menu.php" ?>
    </header>
    <?php
        if (!isset($_GET["slug"])) {
            exit("slug is not present in URL");
        }
        $id = $_GET["slug"];
        $query = "SELECT p.*,i.path from products p inner join images i on i.id = p.list_image_id where slug='".$id."'";
        if ($result = $mysqli->query($query)) {
            $row = $result->fetch_assoc();
    ?>
            <div class="container">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/<?=$row["path"] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><?=$row["name"] ?></h1>
                    <p class="lead"><?=$row["description"]?></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <?php 
						if ($row["providerLink_url"]) {
						?>
                            <a type="button" target="_blank" href="<?=$row["providerLink_url"] ?>"
                                class="btn btn-primary btn-lg px-4 me-md-2">
                                Ver Página del proveedor
                            </a>
                            <?php
						}?>
                    </div>
                </div>
            </div>

        <?php
            $result->free();
        }
        ?>
<?php include "footer.php" ?>
