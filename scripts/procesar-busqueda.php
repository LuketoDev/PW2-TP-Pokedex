<?php
require_once $_SERVER['DOCUMENT_ROOT'].'configRutas.php';
require_once ROOT_PATH.'scripts/MyDatabase.php';

if (!isset($_GET["busqueda"]) || trim($_GET["busqueda"]) === ""){
    header("Location: ".BASE_URL."/index.php");
    exit();
}

$database = new MyDatabase();

$busqueda = trim($_GET["busqueda"]);
$tiposDePokemon = array_column($database->selectQuery("SELECT tipo FROM pokemon"), 'tipo'); //el array column hace que no tenga que acceder a los valores por indice y luego acceder al campo, sino que ya directamente me da el valor del campo

if (in_array(strtoupper($busqueda), $tiposDePokemon)){
    header("Location: ".BASE_URL."index.php?tipo=".urlencode(strtoupper($busqueda)));
    exit();
}

//if (in_array(strtoupper($busqueda), $tipos)) {
//    header("Location: ".BASE_URL."index.php?tipo=".urlencode(strtoupper($busqueda)));
//    exit();
//}

if (is_numeric($busqueda)){
    header("Location: ".BASE_URL."index.php?identificador_numerico=".urlencode($busqueda));
    exit();
}

header("Location: ".BASE_URL."index.php?nombre=".urlencode($busqueda));
exit();



