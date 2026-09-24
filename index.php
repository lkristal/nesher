<!DOCTYPE html>
<html lang="es">
	<?php include "head.php" ?>
<body>
    <header>
		 <?php include "menu.php" ?>
    </header>
		<main role="main">
			<section class="home-hero">
			<div id="carouselExampleCaptions" class="carousel slide hero-carousel" data-bs-ride="carousel">
				<div class="carousel-indicators">
				<?php
					$query = "SELECT name, description, slug,  images.path from products inner join images on images.id = products.primary_image_id where products.deleted_at is null AND slide_order>0 ORDER BY slide_order";
					if ($result = $mysqli->query($query)) {
						$active = "active";
						$rowcount = mysqli_num_rows( $result );
						for($i=0; $i<$rowcount; $i++)
						{ ?>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i ?>" class="<?=$active ?>" aria-current="true" aria-label="Slide <?=$i+1 ?>"></button>
						<?php
							$active="";
						} ?>
				</div>
				<div class="carousel-inner">
					<?php 
						$active = "active";
						while ($row = $result->fetch_assoc()) {
						?>
							<div class="carousel-item <?=$active ?>">
								<a href="detalle2.php?slug=<?=$row["slug"] ?>">
							  		<img src="images/<?=$row["path"] ?>" class="d-block w-100 hero-image" alt="<?=$row["name"] ?>">
								</a>
								<div class="carousel-caption text-start">
									<span class="eyebrow">Tecnología para la industria plástica</span>
									<h1><?=$row["name"] ?></h1>
									<p><?=$row["description"] ?></p>
									<a href="detalle2.php?slug=<?=$row["slug"] ?>" class="btn btn-nesher btn-lg">Conocer el producto</a>
								</div>
							</div>
							<?php
								$active="";
							}
							$result->free();
						}
					?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			</section>
			<section class="products-section py-5 py-lg-6">
			<div class="container">
				<div class="section-heading text-center mx-auto mb-4 mb-lg-5">
					<span class="eyebrow text-primary">Productos destacados</span>
					<h2>Soluciones que impulsan su producción</h2>
					<p>Equipamiento confiable para optimizar cada etapa del proceso industrial.</p>
				</div>
				<div class="row g-4">
					<?php 
						$query = "SELECT name, slug, description, images.path from products inner join images on images.id = products.list_image_id where products.deleted_at is null AND home_highlighted=1";
						if ($result = $mysqli->query($query)) {
							while ($row = $result->fetch_assoc()) {
						?>
							<div class="col-12 col-md-6 col-lg-4">
								<div class="card product-card h-100">
									<div class="product-image-wrap">
									  <a href="detalle.php?slug=<?=$row["slug"] ?>" class="product-link mt-auto">
										<img class="card-img-top" src="images/<?=$row["path"] ?>" alt="<?=$row["name"] ?>">
									  </a>
									</div>
									<div class="card-body d-flex flex-column">
									  <h5 class="card-title"><?=$row["name"] ?></h5>
									  <p class="card-text product-description"><?=$row["description"] ?></p>
									  <a href="detalle.php?slug=<?=$row["slug"] ?>" class="product-link mt-auto">Ver producto <span aria-hidden="true">→</span></a>
									</div>
								 </div>
							</div>
						<?php
							}
							$result->free();
						}
						?>
				</div>
			</div>
			</section>
        </main>

<?php include "footer.php" ?>
