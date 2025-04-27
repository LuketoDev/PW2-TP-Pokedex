<?php
include_once ("MyDatabase.php");
function cargarTabla(){
    $database = new MyDatabase('localhost:3307', 'root', '', 'pokedex');

    $query = '';

    if (isset($_GET['tipo'])){
        $tipo = $_GET['tipo'];
        $query = "SELECT * FROM pokemon WHERE tipo = '$tipo'";
    }else if (isset($_GET['identificador_numerico'])){
        $identificador_numerico = $_GET['identificador_numerico'];
        $query = "SELECT * FROM pokemon WHERE identificador_numerico = '$identificador_numerico'";
    }else if (isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        $query = "SELECT * FROM pokemon WHERE nombre = '$nombre'";
    }else $query = "SELECT * FROM pokemon";

    $pokemonsCargados = $database->selectQuery($query);
    $tablaHTML='';

    if (count($pokemonsCargados) === 0){ // si la query no encontro nada, mostrar un error y abajo la tabla completa de pokemons
        $pokemonsCargados = $database->selectQuery("SELECT * FROM pokemon");
        $tablaHTML .= "<h2 class='alert alert-danger text-center'>Pokemon no encontrado</h2>";
    }

    $tablaHTML .= '<h1 class="text-center">Lista de Pokemons</h1>
                    <table class="table table-striped">
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Numero</th>
                        <th class="text-center">Nombre</th>
                    </tr>';

    foreach ($pokemonsCargados as $pokemon){
        $tablaHTML .= '<tr>
                        <th class="text-center"><img class = "img-pokemon" src="'.$pokemon["imagen"].'"></th>
                        <th class="text-center"><img src="./imagenes/tipo/'.strtolower($pokemon["tipo"]).'.png"></th>
                        <th class="text-center">'.$pokemon["identificador_numerico"].'</th>
                        <th class="text-center"><a href="detalle.php?id='.$pokemon["id"].'">'.$pokemon["nombre"].'</a></th>
                       </tr>';
    }

    $tablaHTML .= '</table>';

    return $tablaHTML;

}