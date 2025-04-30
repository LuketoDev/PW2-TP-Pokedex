<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';
function evaluarRegistro(){

    if(isset($_GET['registro'])){

        $registro = $_GET['registro'];

        $msjHTML='';

        switch($registro){
            case 'incompleto':
                $msjHTML.="<div class='alert alert-danger text-center'>Ingrese todos los datos porfavor</div>";
                break;
            case 'correcto':
                $msjHTML.="<div class='alert alert-success text-center'>Registro Exitoso!<br>Ahora es administrador y puede <a href='index.php'>Loguearse</a></div>";
                break;
            case 'incorrecto':
                $msjHTML.="<div class='alert alert-danger text-center'>Registro erroneo, ese nombre de usuario ya esta ocupado por otro administrador</div>";
                break;
            default:
                break;
        }
        return $msjHTML;
    }
}

function generarContenidoRegistrarse(){
    return '<nav id="nav" class="navbar navbar-expand-lg">
                <div class="container-fluid d-flex justify-content-between p-1">
                    <a href="'.BASE_URL.'index.php"><img id="logotipo-principal" src="'.BASE_URL.'imagenes/logos/pokebola.png"></a>
                    <a href="'.BASE_URL.'index.php"><img id="logotipo-pokedex" src="'.BASE_URL.'imagenes/logos/logo-pokedex.png"></a>
                </div>
            </nav>
        
            <main role="main" class="container-fluid container-lg w-100">
            
                <div class = "container-fluid">
                    <div id="register-box"  class=" m-auto col-sm-10 col-lg-7 mt-5">
            
                        <form id="form-registro" method="POST" action="'.BASE_URL.'scripts/procesar-registro.php" class="d-flex flex-column align-items-center gap-4 m-auto w-75 text-center p-3 p-lg-5 rounded-3 border border-secondary">
                            <h2>Formulario de registro Pokedex!</h2>
                            <input class="w-100" type="text" name="username" placeholder="Ingrese un nombre de usuario">
                            <input class="w-100" type="password" name="password" placeholder="Ingrese una contrasenia">
                            <input class="w-100 btn btn-outline-success p-lg-3" type="submit" value="Registrarse">
                                '.evaluarRegistro().'
                        </form>
                    </div>
                </div>
            </main>';
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
        echo generarContenidoRegistrarse();
    ?>

<!-- Boostrap core js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>