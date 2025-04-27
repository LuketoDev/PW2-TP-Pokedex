<?php
session_start();
session_destroy();

$pagina_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';
header('Location: '.$pagina_anterior);
exit();

