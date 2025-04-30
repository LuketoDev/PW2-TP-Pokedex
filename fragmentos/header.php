<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';

session_start();
function encabezado(){

    $seccionLogin = '';
    $msjErrorLogin = '';

    if (isset($_SESSION['dbId'])) $seccionLogin = '<h3 class="text-center">Usuario '.strtoupper($_SESSION["username"]).'</h3><a href="'.BASE_URL.'scripts/cerrar-sesion.php" class="btn btn-outline-success ms-2 me-2 mb-1">Cerrar sesion</a>';

    else {

        if(isset($_GET["error"]) && $_GET["error"] === "login") $msjErrorLogin = '<div class="row text-center text-danger" role="alert"><div class="col-12 mt-1 fw-bold">Usuario/Contrasenia incorrecta</div></div>';

        $seccionLogin = '<form action="'.BASE_URL.'scripts/procesar-login.php" method="POST">
                            <div class="container-fluid ">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 col-md-8 d-flex me-0 p-0">
                                        <input class="form-control me-2" type="text" placeholder="Usuario" name="username" aria-label="Usuario">
                                        <input class="form-control" type="password" placeholder="Password" name="password" aria-label="Password">
                                    </div>
                                    <div class="col-12 col-md-4 w-auto mt-2 mt-md-0 pe-0 ">
                                        <button class="btn btn-outline-success me-2" type="submit">Ingresar</button>
                                        <a href="'.BASE_URL.'registrarse.php" class="btn btn-outline-success">Registrarse</a>
                                    </div>
                                </div>
                                '.$msjErrorLogin.'
                            </div>
                        </form>';
        }

    return '<nav id="nav" class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between p-1">
            <a href="'.BASE_URL.'index.php"><img id="logotipo-principal" src="'.BASE_URL.'imagenes/logos/pokebola.png"></a>
            <a href="'.BASE_URL.'index.php"><img id="logotipo-pokedex" src="'.BASE_URL.'imagenes/logos/logo-pokedex.png"></a>


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
