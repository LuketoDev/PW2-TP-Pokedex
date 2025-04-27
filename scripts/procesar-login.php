<?php

include 'MyDatabase.php';

session_start();

$database = new MyDatabase();

if($_POST["username"] != "" && $_POST["password"] != ""){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $database->query("SELECT * FROM administrador WHERE username = '$username' AND password = '$password'");

    $pagina_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';

    if(empty($user)){
        // Obtener la URL de la página anterior desde el encabezado Referer

        header('Location: '.$pagina_anterior.'?error=login');
        exit();
    }else{
        $_SESSION["dbId"] = $user[0]["id"];
        $_SESSION["username"] = $username;
        header('Location: '.$pagina_anterior);
        exit();
    }
}