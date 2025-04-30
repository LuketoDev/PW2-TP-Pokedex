<?php

require_once 'MyDatabase.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';

session_start();
function agregarErrorLoginPorGet($pagina_anterior)
{
//Busca la posición de la primera aparición de un texto (needle) dentro de otro (haystack).
    //Si encuentra el texto → devuelve la posición (un número empezando desde 0).
    //Si no lo encuentra → devuelve false.
    if (strpos($pagina_anterior, 'error=login') === false) {// si no posee el error sumarselo, si ya lo tiene no se lo agregamos de nuevo
        (strpos($pagina_anterior, '?') === false) // si no tiene parametros get
            ? $pagina_anterior .= "?error=login"// se los creamos
            : $pagina_anterior .= "&error=login"; // si ya tiene parametros get, le sumamos un valor mas
    }
    return $pagina_anterior;
}

$database = new MyDatabase();

// Obtener la URL de la página anterior desde el encabezado Referer
$pagina_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URL.'index.php';


if($_POST["username"] != "" && $_POST["password"] != ""){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $database->selectQuery("SELECT * FROM administrador WHERE username = '$username' AND password = '$password'");

    if(!empty($user)){
        $_SESSION["dbId"] = $user[0]["id"];
        $_SESSION["username"] = $username;
        header('Location: '.$pagina_anterior);
        exit();
    }
}

$pagina_anterior = agregarErrorLoginPorGet($pagina_anterior);
header('Location: '.$pagina_anterior);
exit();
