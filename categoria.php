<?php
    if (!isset($_GET["category_id"])) {
            exit("category id is not present in URL");
    }
    $id = $_GET["category_id"];    
    switch ($id)
    {
        case 1:
            $detalle = "detalle2.php";
            $innerid = "primary_image_id";               
            break;
        case 8:
        case 10:
            $detalle = "videos.php";
            $innerid = "list_image_id";               
            break;
        default:
            $detalle = "detalle.php";
            $innerid = "list_image_id";               
            break;
    }
    
    require_once "conexion.php";
    $query = "SELECT slug FROM products
    WHERE products.deleted_at IS NULL AND category_id = $id";
   
    if ($resultCantidad = $mysqli->query($query)) {
        if ($resultCantidad->num_rows === 1) {
            $producto = $resultCantidad->fetch_assoc();
            
            header("Location: " . $detalle . "?slug=" . rawurlencode($producto["slug"]));
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <?php include "head.php" ?>
<body>
    <?php
        if (!isset($_GET["category_id"])) {
            exit("category id is not present in URL");
        }
        $id = $_GET["category_id"];
    ?>

    <header>
		 <?php include "menu.php" ?>
    </header>
    <main>
    <section class="page-header">
        <div class="container">
            <span class="eyebrow">Catálogo Nesher</span>
            <h1>Equipamiento para la industria plástica</h1>
            <p>Conozca nuestra selección de máquinas, equipos y auxiliares.</p>
        </div>
    </section>
    <section class="products-section py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $query = "SELECT name, description, slug,  images.path from products inner join images on images.id = products.". $innerid ." where products.deleted_at is null AND category_id=".$id;
            if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) { ?> 
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card product-card h-100">
                            <div class="product-image-wrap">
                                <img class="card-img-top" src="images/<?=$row["path"] ?>" alt="<?=$row["name"] ?>">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?=$row["name"] ?></h5>
                                <a href="<?=$detalle ?>?slug=<?=$row["slug"] ?>" class="product-link mt-auto">Ver producto <span aria-hidden="true">→</span></a>
                            </div>
                            </div>
                    </div>
                <?php
                }
                $result->free();
            } ?>
        </div>
    </div>
    </section>
    </main>
<?php include "footer.php" ?>
