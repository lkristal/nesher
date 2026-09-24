<?php 
		$db = parse_ini_file("config.ini");
		$user = $db['user'];
		$pass = $db['pass'];
		$name = $db['name'];
		$host = $db['host'];

		$mysqli = new mysqli($host, $user, $pass, $name); 
		$mysqli->select_db($name) or die("Unable to select database".$name);
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nesher</title>
	<meta name="description" content="Máquinas, equipos y auxiliares para la industria plástica." />
	<link rel="shortcut icon" href="images/favicon.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="assets/site.css?v=1.0" rel="stylesheet">
</head>

