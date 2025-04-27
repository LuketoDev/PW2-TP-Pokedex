<?php
include("./scripts/cargarTabla.php");
include("./scripts/cargarDetallePokemon.php");
include("./fragmentos/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <title>Pokedex</title>

    <!-- Boostrap core css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<?php
echo encabezado();
?>

<main role="main" class="container-fluid container-lg w-100">

    <div class = "container-fluid">
        <div id="pokemon-detalle-box"  class="d-flex flex-wrap justify-content-evenly w-100 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mt-5">

            <?php
            echo cargarDetallePokemon();
            ?>

        </div>
    </div>
</main>


<!-- Boostrap core js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
