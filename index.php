<?php
require_once("./scripts/cargarTabla.php");
require_once("./fragmentos/header.php");

function informarBaja(){
    if(isset($_GET['baja'])) {
        $baja = $_GET['baja'];
        return "<div class='alert alert-success text-center mt-4'>Baja Exitosa!<br>El pokemon $baja fue eliminado de la pokedex</div>";
    }
}

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

    <main role="main" class="container-fluid container-lg">
        <div class="container-fluid mt-5">
            <form action="./scripts/procesar-busqueda.php" method="GET" class="d-flex justify-content-center" role="search">
                <div class="row w-100">
                    <div class="col-12 col-md-7 col-lg-8">
                        <input class="form-control p-lg-3" type="search" placeholder="Ingrese nombre, tipo o numero de pokemon" aria-label="Search" name="busqueda">
                    </div>
                    <div class="col-6 col-md-5 col-lg-4 m-auto mt-2 mt-md-0">
                        <button class="btn btn-outline-primary w-100 p-lg-3" type="submit">Quien es este pokemon?</button>
                    </div>

            </form>
        </div>

        <?php
            echo informarBaja();
        ?>

        <div class = "container-fluid">
            <div id="tabla-box"  class="w-100 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mt-5">

                <?php
                    echo cargarTabla();
                ?>
            </div>
        </div>
    </main>


    <!-- Boostrap core js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>