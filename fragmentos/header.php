<?php

function encabezado(){
    return '<nav id="nav" class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between p-1">
            <a href="index.php"><img id="logotipo-principal" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Pok%C3%A9_Ball_icon.svg/2052px-Pok%C3%A9_Ball_icon.svg.png"></a>
            <a href="index.php"><img id="logotipo-pokedex" src="./imagenes/logos/logo-pokedex.png"></a>


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
    </nav>';
}
