<?php
include_once('MyDatabase.php');
function cargarDetallePokemon(){

    if(!isset($_GET["id"]))
        return "<h2 class='alert alert-danger text-center'>Por favor seleccione un pokemon de la tabla para mostrar sus detalles</h2>";
    else{

        $id = $_GET["id"];
        $database = new MyDatabase();
        $pokemon = $database->selectQuery("SELECT * FROM pokemon WHERE id = '$id'");

        if(count($pokemon) === 0)
            return "<h2 class='alert alert-danger text-center'>No se encontro ningun pokemon con ese id en nuestra pokedex<br>(puede darlo de alta si es admin)</h2>";


        return '<div class="row">
                    <div class="col-12 col-md-5 d-flex justify-content-center">
                        <img id="img-pokemon-detalle" class="w-100 w-md-50 w-lg-25" src="'.$pokemon[0]["imagen"].'">
                    </div>
                    <div class="col-12 col-md-7 d-flex justify-content-center pt-4 pt-md-2">
                        <div class="ms-md-5 w-100">
                            <div class="d-flex flex-wrap align-items-center ms-3">
                              <img id="img-tipo-detalle" src="./imagenes/tipo/'.strtolower($pokemon[0]["tipo"]).'.png">
                              <h2 class="ms-4">'.$pokemon[0]["identificador_numerico"].' '.$pokemon[0]["nombre"].'</h2>
                            </div>
                            <p id="descripcion" class="w-100 mt-2 p-2 rounded-2">'. htmlspecialchars($pokemon[0]["descripcion"]).'</p>
                        </div>
                    </div>
                </div>';
    }




}