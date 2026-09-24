<!DOCTYPE html>
<html lang="es">
    <?php include "head-detalle.php" ?>
    <body>
        <header>
            <?php include "menu.php" ?>
        </header>
        <main>
        <section class="product-hero py-5 py-lg-6">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-4 g-lg-5">
            <div class="col-12 col-lg-6">
                <div class="product-main-image">
                    <img src="images/<?=$row["path"] ?>" class="d-block mx-auto img-fluid" alt="<?=$row["name"] ?>" width="700" height="500" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6">
                <span class="eyebrow text-primary">Soluciones Nesher</span>
                <h1 class="product-title mb-4"><?=$row["name"] ?></h1>
                <div class="product-copy mb-4"><?=$row["description"]?></div>
                <div class="d-grid gap-3 d-sm-flex flex-sm-wrap">
                    <?php
                    $query = "SELECT f.*
                            FROM files f
                            INNER JOIN file_product fp ON f.id = fp.file_id
                            WHERE fp.product_id = " . $row["id"];

                    if ($resultfiles = $mysqli->query($query)) {
                        while ($rowfiles = $resultfiles->fetch_assoc()) {
                    ?>
                            <a type="button"
                            target="_blank"
                            href="files/<?=$rowfiles["path"] ?>"
                            class="btn btn-nesher btn-lg">

                                <?=substr($rowfiles["path"], 0, strlen($rowfiles["path"]) - 4) ?>
                            </a>
                    <?php
                        }

                        $resultfiles->free();
                    }
                    ?>

                    <?php if (!empty($row["providerLink_url"])) { ?>
                        <a type="button"
                        target="_blank"
                        href="<?=$row["providerLink_url"] ?>"
                        class="btn btn-outline-nesher btn-lg">

                            Ver Página del proveedor
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
        </section>

        <?php
        // ARMO EL CAROUSEL
        $query = "SELECT p.name, i.path from products p inner join image_product ip on p.id=ip.product_id inner join images i on i.id = ip.image_id where p.slug='". $id . "'";
        if ($resultcarousel = $mysqli->query($query)) { 
            if ($resultcarousel->num_rows > 0) {
            ?>

            <section class="product-media-section pb-5">
            <div class="container">
                <div class="section-heading mb-4">
                    <span class="eyebrow text-primary eyebrow-lg">Galería</span>
                </div>
                <div id="carouselExampleControls" class="carousel slide product-gallery" data-bs-ride="carousel">
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
            </section>
        <?php
            }         
        }
        // ARMO LOS VIDEOS
        if (!empty($row["youtubeVideo_video_code"])) {
            ?>
                <section class="video-section pb-5">
                <div class="container">
                    <div class="section-heading mb-4">
                        <span class="eyebrow text-primary">Video</span>
                        <h2>Véalo en funcionamiento</h2>
                    </div>
                    <div class="ratio ratio-16x9 video-frame">
                    <iframe
                        src="https://www.youtube.com/embed/<?=$row["youtubeVideo_video_code"] ?>?controls=0&amp;showinfo=0"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                    </div>
                </div>
                </section>
            <?php
        }
        ?>
        </main>
<?php include "footer.php" ?>
