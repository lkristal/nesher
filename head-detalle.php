<head>
        <?php 
               require_once "conexion.php";
                if (!isset($_GET["slug"])) {
                        exit("slug is not present in URL");
                }
                $id = $_GET["slug"];
                $query = "SELECT p.*, i.path
                        FROM products p
                        INNER JOIN images i ON i.id = p.list_image_id
                        WHERE p.slug = '".$id."'";

                $resultProduct = $mysqli->query($query);

                if (!$resultProduct) {
                        die("Error en la consulta: " . $mysqli->error);
                }

                $row = $resultProduct->fetch_assoc();

                if (!$row) {
                        http_response_code(404);
                        exit("ProductoProducto no encontrado");
                }

                $resultProduct->free();        
                ?>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/favicon.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="assets/site.css?v=1.0" rel="stylesheet">

    <title>Nesher - <?=$row["name"] ?></title>

    <meta property="og:title" content="<?=$row["name"] ?>">
    <meta property="og:description"
            content="<?=$row["description"] ?>">

    <meta property="og:image"
            content="https://nesher.com.ar/images/<?=$row["path"] ?>">
    <meta property="og:image:secure_url"
            content="https://nesher.com.ar/images/<?=$row["path"] ?>">

    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="700">
    <meta property="og:image:height" content="500">
    <meta property="og:image:alt"
            content="<?=$row["name"] ?>">

    <meta property="og:url"
            content="https://nesher.com.ar/detalle.php?slug=<?=$row["slug"] ?>">
    <meta property="og:type" content="product">

</head>

