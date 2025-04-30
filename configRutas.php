<?php

// Ruta base del servidor (para includes y requires)
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/'); // usar /TP-Pokedex en la pc
// URL base del sitio (para href, src, etc.)
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/'); // usar /TP-Pokedex en la pc