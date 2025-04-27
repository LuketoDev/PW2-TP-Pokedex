<?php

include 'MyDatabase.php';

session_start();

$database = new MyDatabase();

// Obtener la URL de la página anterior desde el encabezado Referer
$pagina_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';


if($_POST["username"] != "" && $_POST["password"] != ""){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $database->query("SELECT * FROM administrador WHERE username = '$username' AND password = '$password'");

    if(!empty($user)){
        $_SESSION["dbId"] = $user[0]["id"];
        $_SESSION["username"] = $username;
        header('Location: '.$pagina_anterior);
        exit();
    }else{
        header('Location: '.$pagina_anterior.'?error=login');
        exit();
    }
}else{
    header('Location: '.$pagina_anterior.'?error=login');
    exit();
}