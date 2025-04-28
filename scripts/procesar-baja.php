<?php
session_start();
include 'MyDatabase.php';


if (isset($_SESSION['dbId'])){

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $database = new MyDatabase();
        $nombre = $database->selectQuery("SELECT nombre FROM pokemon WHERE id = '$id'");
        $database->executeQuery("DELETE FROM pokemon WHERE id=$id");
        header('Location: ../index.php?baja='.$nombre[0]['nombre']);
        exit();
    }
}

header('Location: ../index.php');
exit();
