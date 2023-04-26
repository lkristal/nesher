<?php 
		$db = parse_ini_file("config.ini");
		$user = $db['user'];
		$pass = $db['pass'];
		$name = $db['name'];
		$host = $db['host'];

		$mysqli = new mysqli($host, $user, $pass, $name); 
		$mysqli->select_db($name) or die("Unable to select database".$name);
?>
<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-light border-bottom box-shadow mb-3">
	<div class="container-fluid">
		<a class="navbar-brand" href=".">
			<img src="images/logo.png" alt="" width="232" height="71" class="d-inline-block align-text-top">
		</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
			<ul class="navbar-nav flex-grow-1">
					<?php 
						$query = "SELECT * from categories where visible_menu=1 and deleted_at is null";
						if ($result = $mysqli->query($query)) {
							while ($row = $result->fetch_assoc()) {
								$active = (!isset($_GET["category_id"]) ? "" : ($row["id"] == $_GET["category_id"] ? "text-primary fw-bolder" : ""));
							?>
								<li class="nav-item">
									<a class="nav-link <?=$active ?>" href="categoria.php?category_id=<?=$row["id"] ?>"><?=$row["name"] ?></a>
								</li>
							<?php
							}
							$result->free();
						}
					?>
			</ul>
		</div>
	</div>
</nav>