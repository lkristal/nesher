<!DOCTYPE html>
<html lang="es">
    <?php include "head.php" ?>
<body>
    <header>
		 <?php include "menu.php" ?>
    </header>

    <main>
    <?php
        // ARMO EL JUMBOTRON 
        if (!isset($_GET["slug"])) {
            exit("slug is not present in URL");
        }
        $id = $_GET["slug"];

        $query = "SELECT p.*,i.path from products p inner join images i on i.id = p.list_image_id where slug='".$id."'";
        if ($result = $mysqli->query($query)) {
            $row = $result->fetch_assoc();
            
            // SIIENE DESCRIPCION LA MUESTRO COMO HTML
            if ($row["description"]) {
                echo html_entity_decode($row["description"], ENT_QUOTES | ENT_HTML5,  "UTF-8");
            }
            else
            {
                ?>
                    <section class="page-header video-page-header">
                        <div class="container">
                            <span class="eyebrow">Contenido audiovisual</span>
                            <h1><?=$row["name"] ?></h1>
                        </div>
                    </section>
                <?php 
            } 
            // ARMO LOS VIDEOS
            if ($row["youtubeVideo_video_code"]) {
            ?>
                <section class="video-section py-5">
                <div class="container">
                    <div class="ratio ratio-16x9 video-frame">
                        <iframe src="https://www.youtube.com/embed/<?=$row["youtubeVideo_video_code"] ?>?controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                </section>
            <?php 
            } 
            $result->free();
        }
        ?>
            </main>

<?php include "footer.php" ?>
