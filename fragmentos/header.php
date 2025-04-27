<?php

session_start();
function encabezado(){

    $seccionLogin = '';
    $msjErrorLogin = '';

    if (isset($_SESSION['dbId'])) $seccionLogin = '<h3 class="text-center">Usuario '.strtoupper($_SESSION["username"]).'</h3><a href="./scripts/cerrar-sesion.php" class="btn btn-outline-success ms-2 me-2 mb-1">Cerrar sesion</a>';

    else {

        if(isset($_GET["error"]) && $_GET["error"] === "login") $msjErrorLogin = '<div class="row text-center text-danger" role="alert"><div class="col-12 mt-1 fw-bold">Usuario/Contrasenia incorrecta</div></div>';

        $seccionLogin = '<form action="./scripts/procesar-login.php" method="POST">
                            <div class="container-fluid ">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 col-md-8 d-flex me-0 p-0">
                                        <input class="form-control me-2" type="text" placeholder="Usuario" name="username" aria-label="Usuario">
                                        <input class="form-control" type="password" placeholder="Password" name="password" aria-label="Password">
                                    </div>
                                    <div class="col-12 col-md-4 w-auto mt-2 mt-md-0 pe-0 ">
                                        <button class="btn btn-outline-success me-2" type="submit">Ingresar</button>
                                        <a href="registrarse.php" class="btn btn-outline-success">Registrarse</a>
                                    </div>
                                </div>
                                '.$msjErrorLogin.'
                            </div>
                        </form>';
        }

    return '<nav id="nav" class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between p-1">
            <a href="index.php"><img id="logotipo-principal" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Pok%C3%A9_Ball_icon.svg/2052px-Pok%C3%A9_Ball_icon.svg.png"></a>
            <a href="index.php"><img id="logotipo-pokedex" src="./imagenes/logos/logo-pokedex.png"></a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mt-1" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                     '.$seccionLogin.'   
                </div>
            </div>
        </div>
    </nav>';
}
