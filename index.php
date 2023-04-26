<!DOCTYPE html>
<html lang="en">
	<?php include "head.php" ?>
<body>
    <header>
		 <?php include "menu.php" ?>
    </header>
    <div class="container-fluid">
        <main role="main" class="pb-3">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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
							  		<img src="images/<?=$row["path"] ?>" class="d-block w-100" alt="<?=$row["name"] ?>">
								</a>
								<div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50" style="bottom:-0.75rem;padding-top:0;padding-bottom:0;">
									<h5><?=$row["name"] ?></h5>
									<p><?=$row["description"] ?></p>
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
			<div class="container">
				<div class="row">
					<?php 
						$query = "SELECT name, slug, description, images.path from products inner join images on images.id = products.list_image_id where products.deleted_at is null AND home_highlighted=1";
						if ($result = $mysqli->query($query)) {
							while ($row = $result->fetch_assoc()) {
						?>
							<div class="col-12 col-md-4">
								<div class="card m-2 bg-dark bg-opacity-25">
									<img class="card-img-top" class="w-100" src="images/<?=$row["path"] ?>" alt="<?=$row["name"] ?>">
									<div class="card-body">
									  <h5 class="card-title"><?=$row["name"] ?></h5>
									  <a href="detalle.php?slug=<?=$row["slug"] ?>" class="btn btn-primary">Ver Mas</a>
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
        </main>
    </div>

<?php include "footer.php" ?>
