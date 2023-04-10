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
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/<?=$row["path"] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
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
