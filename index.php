<?php
include("./scripts/cargarTabla.php")
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

    <nav id="nav" class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between p-1">
            <img id="logotipo-principal" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Pok%C3%A9_Ball_icon.svg/2052px-Pok%C3%A9_Ball_icon.svg.png">
            <img id="logotipo-pokedex" src="./imagenes/logos/logo-pokedex.png">


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mt-1" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                        <form> <!-- Aca hacer un procesar login-->
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="row d-flex">
                                    <div class="col-12 col-md-8 d-flex me-0 p-0">
                                        <input class="form-control me-2" type="text" placeholder="Usuario" aria-label="Usuario">
                                        <input class="form-control" type="password" placeholder="Password" aria-label="Password">
                                    </div>
                                    <div class="col-12 col-md-4 d-flex justify-content-center mt-2 mt-md-0 ps-0 pe-0 ">
                                        <button class="btn btn-outline-success me-2" type="submit">Ingresar</button>
                                        <a href="#" class="btn btn-outline-success">Registrarse</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </nav>

    <main role="main" class="container-fluid container-lg">
        <div class="container-fluid mt-5">
            <form class="d-flex justify-content-center" role="search">
                <div class="row w-100">
                    <div class="col-12 col-md-7 col-lg-8">
                        <input class="form-control p-lg-3" type="search" placeholder="Ingrese nombre, tipo o numero de pokemon" aria-label="Search">
                    </div>
                    <div class="col-6 col-md-5 col-lg-4 m-auto mt-2 mt-md-0">
                        <button class="btn btn-outline-primary w-100 p-lg-3" type="submit">Quien es este pokemon?</button>
                    </div>

            </form>
        </div>

        <div class = "container-fluid">
            <div id="tabla-box"  class="w-100 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mt-5">


                <h1 class="text-center">Lista de Pokemons</h1>
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