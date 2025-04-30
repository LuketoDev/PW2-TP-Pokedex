<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/configRutas.php';
require_once 'MyDatabase.php';


if (isset($_SESSION['dbId'])){

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $database = new MyDatabase();
        $pokemonABorrar = $database->selectQuery("SELECT * FROM pokemon WHERE id = '$id'");

        $rutaImagen = $_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/'.$pokemonABorrar[0]['imagen'];
        if (file_exists($rutaImagen)) unlink($rutaImagen);  // Elimina el archivo

        $database->executeQuery("DELETE FROM pokemon WHERE id=$id");
        header('Location: '.BASE_URL.'index.php?baja='.$pokemonABorrar[0]['nombre']);
        exit();
    }
}

header('Location: '.BASE_URL.'index.php');
exit();
