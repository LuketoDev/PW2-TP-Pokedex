<?php

if (!isset($_GET["busqueda"]) || trim($_GET["busqueda"]) === ""){
    header("Location: ../index.php");
    exit();
}

$busqueda = trim($_GET["busqueda"]);

$tipos = array("PLANTA", "FUEGO", "AGUA", "ELECTRICO");
if (in_array(strtoupper($busqueda), $tipos)) {
    header("Location: ../index.php?tipo=".urlencode(strtoupper($busqueda)));
    exit();
}

if (is_numeric($busqueda)){
    header("Location: ../index.php?identificador_numerico=".urlencode($busqueda));
    exit();
}

header("Location: ../index.php?nombre=".urlencode($busqueda));
exit();



