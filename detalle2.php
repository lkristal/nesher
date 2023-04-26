<!DOCTYPE html>
<html lang="en">
    <?php include "head.php" ?>
<body>
    <header>
		 <?php include "menu.php" ?>
    </header>

    <?php
        // ARMO EL JUMBOTRON 
        if (!isset($_GET["slug"])) {
            exit("slug is not present in URL");
        }
        $id = $_GET["slug"];

        $query = "SELECT p.*,i.path from products p inner join images i on i.id = p.primary_image_id where slug='".$id."'";
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
                        $query = "SELECT f.* from files f inner join file_product fp on f.id = fp.file_id where fp.product_id=".$row["id"];
                        if ($resultfiles = $mysqli->query($query)) {
                            while ($rowfiles = $resultfiles->fetch_assoc()) {
                        ?>
                            <a type="button" target="_blank" href="files/<?=$rowfiles["path"] ?>"
                                class="btn btn-primary btn-lg px-4 me-md-2">
                                <?=substr($rowfiles["path"],0, strlen($rowfiles["path"])-4) ?>
                            </a>
                            <?php
                            }
                            $resultfiles->free();
                        }?>

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

        // ARMO EL CAROUSEL
        $query = "SELECT p.name, i.path from products p inner join image_product ip on p.id=ip.product_id inner join images i on i.id = ip.image_id where p.slug='". $id . "'";
        if ($resultcarousel = $mysqli->query($query)) { ?>

        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                    <?php
                        $active = " active";
                        while ($rowCarousel = $resultcarousel->fetch_assoc()) {
                            ?>
                            <div class="carousel-item<?=$active ?>">
                                <img class="d-block w-100" src="images/<?=$rowCarousel["path"] ?>" alt="<?=$rowCarousel["name"] ?>">
                            </div>
                            <?php
                            $active="";
                        }
                        $resultcarousel->free(); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>   
            <?php
        } 
            // ARMO LOS VIDEOS
            if ($row["youtubeVideo_video_code"]) {
            ?>
                <div class="container">
                    <iframe width="100%" height="600" src="https://www.youtube.com/embed/<?=$row["youtubeVideo_video_code"] ?>?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php 
            } ?>

        <?php
            $result->free();
        }
        ?>

<?php include "footer.php" ?>
