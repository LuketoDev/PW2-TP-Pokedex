<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';
require_once 'MyDatabase.php';

$database = new MyDatabase();

$id = $_GET['id'];

// pasar a variables boolean

$hayAlgunDato = (isset($_POST["nombre"]) && trim($_POST["nombre"]) !== '') ||
    (isset($_POST["identificador_numerico"]) && trim($_POST["identificador_numerico"]) !== '') ||
    (isset($_POST["tipo"]) && trim($_POST["tipo"]) !== '') ||
    (isset($_POST["descripcion"]) && trim($_POST["descripcion"]) !== '') ||
    (isset($_FILES["imagen"]) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK);


if ( $hayAlgunDato ) {

    if (isset($_POST["nombre"]) && trim($_POST["nombre"]) != ""){
        $nombre = trim($_POST["nombre"]);
        $pokemonsConNombreRepetido = $database->selectQuery("SELECT * FROM pokemon WHERE nombre = '$nombre'");
        if (count($pokemonsConNombreRepetido) === 0){
            $database->executeQuery("UPDATE pokemon SET nombre = '$nombre' WHERE id = $id");
        }
        else{
            header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=nombre-repetido');
            exit();
        }
    }

    if (isset($_POST["identificador_numerico"]) && trim($_POST["identificador_numerico"]) != ""){
        $identificador_numerico = trim($_POST["identificador_numerico"]);
        $pokemonsConIdentificadorNumericoRepetido = $database->selectQuery("SELECT * FROM pokemon WHERE identificador_numerico = '$identificador_numerico'");
        if (count($pokemonsConIdentificadorNumericoRepetido) === 0){
            $database->executeQuery("UPDATE pokemon SET identificador_numerico = '$identificador_numerico' WHERE id = $id");
        }
        else{
            header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=numero-repetido');
            exit();
        }
    }

    if (isset($_POST["tipo"]) && trim($_POST["tipo"]) != ""){
        $tipo = trim($_POST["tipo"]);
        $tiposDePokemon = array_column($database->selectQuery("SELECT tipo FROM pokemon"), 'tipo'); //el array column hace que no tenga que acceder a los valores por indice y luego acceder al campo, sino que ya directamente me da el valor del campo
        if (in_array($tipo, $tiposDePokemon)){
            $database->executeQuery("UPDATE pokemon SET tipo = '$tipo' WHERE id = $id");
        }
        else{
            header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=tipo-incorrecto');
            exit();
        }
    }

    if (isset($_POST["descripcion"]) && $_POST["descripcion"] != ""){
        $descripcion = trim($_POST["descripcion"]);
        $database->executeQuery("UPDATE pokemon SET descripcion = '$descripcion' WHERE id = $id");
    }

    if (isset($_FILES["imagen"]) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){

        $archivoTemporal = $_FILES["imagen"]["tmp_name"];
        $esImagen = getimagesize($archivoTemporal);

        if ($esImagen !== false){

            // borro imagen anterior
            $imagenAnterior = $database->selectQuery("SELECT imagen FROM pokemon WHERE id = $id");
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/Pokedex-TP/'.$imagenAnterior[0]['imagen']))
                unlink($_SERVER['DOCUMENT_ROOT'].'/Pokedex-TP/'.$imagenAnterior[0]['imagen']);

            //subo la nueva
            $nuevoNombre = pathinfo($_FILES["imagen"]['name'], PATHINFO_FILENAME) . '_' . time() . '.png'; // le agrego el tiempo actual para que no se haya conflicto por si se sube alguna con mismo nombre
            $destino = $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/imagenes/pokemon/'. $nuevoNombre;
            move_uploaded_file($archivoTemporal, $destino);

            $database->executeQuery("UPDATE pokemon SET imagen = 'imagenes/pokemon/$nuevoNombre' WHERE id = $id");
        }
        else{
            header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=img-error');
            exit();
        }
    }

    header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=completa');
    exit();

} else {
    header('Location: '.BASE_URL.'modificar-pokemon.php?id='.$id.'&modificar=incompleta');
    exit();
}