<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/configRutas.php';
require_once ROOT_PATH."scripts/MyDatabase.php";
function cargarPokemon($idPokemon){

    $database = new MyDatabase();

    $pokemon = $database->selectQuery("SELECT * FROM pokemon WHERE id = $idPokemon");

    return '
            <div class="carta d-flex flex-column align-items-center gap-2">
                <img class="w-75" src="'.BASE_URL.$pokemon[0]['imagen'].'" class="img-fluid rounded-start" alt="Pokemon">
                <h5 class="w-75 d-flex justify-content-center gap-3">
                    <img class="h-100 mt-1" src="'.BASE_URL.'imagenes/tipo/'.strtolower($pokemon[0]["tipo"]).'.png"> '.$pokemon[0]["identificador_numerico"].' '.$pokemon[0]["nombre"].'
                </h5>
                <p id="descripcion-pokemon-modificacion" class="overflow-auto text-start" style="max-height:200px;">'.$pokemon[0]["descripcion"].'</p> 
            </div>';
}

