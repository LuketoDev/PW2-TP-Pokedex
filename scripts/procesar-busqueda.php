<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';

if (!isset($_GET["busqueda"]) || trim($_GET["busqueda"]) === ""){
    header("Location: ".BASE_URL."/index.php");
    exit();
}

$busqueda = trim($_GET["busqueda"]);

$tipos = array("PLANTA", "FUEGO", "AGUA", "ELECTRICO");// hacerlo con la base de datos sql

if (in_array(strtoupper($busqueda), $tipos)) {
    header("Location: ".BASE_URL."index.php?tipo=".urlencode(strtoupper($busqueda)));
    exit();
}

if (is_numeric($busqueda)){
    header("Location: ".BASE_URL."index.php?identificador_numerico=".urlencode($busqueda));
    exit();
}

header("Location: ".BASE_URL."index.php?nombre=".urlencode($busqueda));
exit();



