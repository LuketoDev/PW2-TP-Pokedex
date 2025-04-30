<?php
require_once("./fragmentos/header.php");

function evaluarAlta(){

    if(isset($_GET['alta'])){

        $alta = $_GET['alta'];

        $msjHTML='';

        switch($alta){
            case 'incompleta':
                $msjHTML.="<div class='alert alert-danger text-center'>Ingrese todos los datos porfavor</div>";
                break;
            case 'completa':
                $msjHTML.="<div class='alert alert-success text-center'>Alta Exitosa!<br>Ahora se puede ver el pokemon en la <a href='index.php'>pokedex</a></div>";
                break;
            case 'nombre-repetido':
                $msjHTML.="<div class='alert alert-danger text-center'>Registro erroneo, ese nombre de pokemon ya esta ocupado por otro </div>";
                break;
            case 'numero-repetido':
                $msjHTML.="<div class='alert alert-danger text-center'>Registro erroneo, ese numero de pokemon ya esta ocupado por otro </div>";
                break;
            case 'tipo-incorrecto':
                $msjHTML.="<div class='alert alert-danger text-center'>Registro erroneo, no aceptamos ese tipo de pokemons por el momento</div>";
                break;
            case 'img-error':
                $msjHTML.="<div class='alert alert-danger text-center'>Registro erroneo, el archivo enviado no corresponde a una imagen</div>";
                break;
            default:
                break;
        }
        return $msjHTML;
    }
}
function cargarFormularioParaAdmins(){
    if (isset($_SESSION['dbId'])){
        return '<form id="form-alta-pokemon" method="POST" action="./scripts/procesar-alta.php" enctype="multipart/form-data" class="d-flex flex-column align-items-center gap-4 m-auto w-75 text-center p-3 p-lg-5 rounded-3 border border-secondary">
                <h2>Formulario de ALTA para pokemon en la Pokedex!</h2>
                <input class="w-75 p-2" type="text" name="nombre" placeholder="Ingrese el nombre del pokemon">
                <input class="w-75 p-2" type="number" name="identificador_numerico" placeholder="Ingrese el numero de pokemon">
                <select class="w-75 p-2" name="tipo" required>
                    <option value="" selected disabled>Selecciona el tipo</option>
                    <option value="PLANTA">Planta</option>
                    <option value="FUEGO">Fuego</option>
                    <option value="AGUA">Agua</option>
                    <option value="ELECTRICO">Electrico</option>
                </select>
                <div class="row w-75 d-flex justify-content-center">
                        <label for="imagen-input" class="w-auto p-2">Seleccione una imagen a subir:</label>
                        <input id="imagen-input" class="w-auto  pt-1" type="file" name="imagen">
                </div>
                <textarea class="w-75 p-2"  name="descripcion" rows="5" cols="40" placeholder="Ingrese una descripcion al pokemon"></textarea>
                <input class="w-75 btn btn-outline-success p-lg-3" type="submit" value="Dar de alta pokemon!">
                '.evaluarAlta().'
            </form>';
    }else{
        return "<h2 class='alert alert-danger text-center'>Esta pagina solo es para ADMINISTRADORES</h2>";
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

<main role="main" class="container-fluid container-lg w-100">

    <div class = "container-fluid">
        <div id="pokemon-form-box"  class="d-flex flex-wrap justify-content-evenly w-100 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 mt-5">

            <?php
            echo cargarFormularioParaAdmins();
            ?>

        </div>
    </div>
</main>


<!-- Boostrap core js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>