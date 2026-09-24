<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top nesher-navbar">
	<div class="container">
		<a class="navbar-brand" href=".">
			<img src="images/logo.png" alt="Nesher - Máquinas, equipos y auxiliares para la industria plástica" width="232" height="94" class="nesher-logo">
		</a>
		<button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNesher" aria-controls="navbarNesher"
				aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarNesher" class="navbar-collapse collapse justify-content-end">
			<ul class="navbar-nav align-items-lg-center gap-lg-1">
					<?php 
						$query = "SELECT * from categories where visible_menu=1 and deleted_at is null";
						if ($resultMenu = $mysqli->query($query)) {
							while ($rowCategory = $resultMenu->fetch_assoc()) {
								$active = (!isset($_GET["category_id"]) ? "" : ($rowCategory["id"] == $_GET["category_id"] ? "text-primary fw-bolder" : ""));
							?>
								<li class="nav-item">
									<a class="nav-link <?=$active ?>" href="categoria.php?category_id=<?=$rowCategory["id"] ?>"><?=$rowCategory["name"] ?></a>
								</li>
							<?php
							}
							$resultMenu->free();
						}
					?>
			</ul>
		</div>
	</div>
</nav>
