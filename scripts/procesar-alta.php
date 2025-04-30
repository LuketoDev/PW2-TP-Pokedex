<?php


require_once 'MyDatabase.php';

$database = new MyDatabase();

$parametroError='';

$estanTodosLosDatos = isset($_POST["nombre"]) && isset($_POST["identificador_numerico"]) && isset($_POST["tipo"]) && isset($_POST["descripcion"]) && isset($_FILES["imagen"]);

if ($estanTodosLosDatos
    && trim($_POST["nombre"]) != ""
    && trim($_POST["identificador_numerico"]) != ""
    && trim($_POST["tipo"]) != ""
    && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){

    $nombre = trim($_POST["nombre"]);
    $identificador_numerico = trim($_POST["identificador_numerico"]);
    $tipo = trim($_POST["tipo"]);
    $descripcion = trim($_POST["descripcion"]);
    $archivoTemporal = $_FILES["imagen"]["tmp_name"];
    $esImagen = getimagesize($archivoTemporal);


    $pokemonsConNombreRepetido = $database->selectQuery("SELECT * FROM pokemon WHERE nombre = '$nombre'");
    $pokemonsConIdentificadorNumericoRepetido = $database->selectQuery("SELECT * FROM pokemon WHERE identificador_numerico = '$identificador_numerico'");
    $tiposDePokemon = array_column($database->selectQuery("SELECT tipo FROM pokemon"), 'tipo'); //el array column hace que no tenga que acceder a los valores por indice y luego acceder al campo, sino que ya directamente me da el valor del campo



    // filtros para determinar error si es que lo hay
    if (count($pokemonsConNombreRepetido) !== 0) $parametroError .= "nombre-repetido";
    else if (count($pokemonsConIdentificadorNumericoRepetido) !== 0) $parametroError .= "numero-repetido";
    else if (!in_array($tipo, $tiposDePokemon)) $parametroError .= "tipo-incorrecto";
    else if ($esImagen === false) $parametroError.="img-error";

    if ($parametroError !== ''){ // si hay error entonces recargar pagina con error
        header("Location: ../alta-pokemon.php?alta=".$parametroError);
        exit();
    }

    // subimos imagen
    $nuevoNombre = pathinfo($_FILES["imagen"]['name'], PATHINFO_FILENAME).'_'.time().'.png'; // le agrego el tiempo actual para que no se haya conflicto por si se sube alguna con mismo nombre
    $destino = '../imagenes/pokemon/'.$nuevoNombre;
    move_uploaded_file($archivoTemporal, $destino);

    // hacemos el insert en la tabla
    $database->executeQuery("INSERT INTO pokemon (nombre, identificador_numerico, tipo, imagen, descripcion) VALUES ('$nombre', '$identificador_numerico', '$tipo', 'imagenes/pokemon/$nuevoNombre', '$descripcion')");

    header('Location: ../alta-pokemon.php?alta=completa');
    exit();

} else {
    header('Location: ../alta-pokemon.php?alta=incompleta');
    exit();
}