<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/configRutas.php';
require_once ROOT_PATH.'scripts/MyDatabase.php';

$database = new MyDatabase();

if(trim($_POST["username"]) != "" && trim($_POST["password"]) != ""){
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $user = $database->selectQuery("SELECT * FROM administrador WHERE username = '$username'");

    if(empty($user)){

        $database->executeQuery("INSERT INTO administrador (username, password) VALUES ('$username', '$password')");

        header('Location: '.BASE_URL.'registrarse.php?registro=correcto');
        exit();
    }else{
        header('Location: '.BASE_URL.'registrarse.php?registro=incorrecto');
        exit();
    }
}else{
    header('Location: '.BASE_URL.'registrarse.php?registro=incompleto');
    exit();
}