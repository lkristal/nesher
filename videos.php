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

        $query = "SELECT p.*,i.path from products p inner join images i on i.id = p.list_image_id where slug='".$id."'";
        if ($result = $mysqli->query($query)) {
            $row = $result->fetch_assoc();
        ?>
            <div class="container">
                <div class="col-12 col-md-12">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><?=$row["name"] ?></h1>                </div>
            </div>
        <?php
            // ARMO LOS VIDEOS
            if ($row["youtubeVideo_video_code"]) {
            ?>
                <div class="container">
                    <iframe width="100%" height="600" src="https://www.youtube.com/embed/<?=$row["youtubeVideo_video_code"] ?>?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php 
            } 
            $result->free();
        }
        ?>

<?php include "footer.php" ?>
