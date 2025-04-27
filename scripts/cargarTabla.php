<?php
include ("MyDatabase.php");
function cargarTabla(){
    $database = new MyDatabase('localhost:3307', 'root', '', 'pokedex');

    $pokemonsCargados = $database->query("SELECT * FROM pokemon");

    $tablaHTML = '<table class="table table-striped">
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Numero</th>
                        <th>Nombre</th>
                    </tr>';

    foreach ($pokemonsCargados as $pokemon){
        $tablaHTML .= '<tr>
                        <th><img class = "img-pokemon" src="'.$pokemon["imagen"].'"></th>
                        <th><img src="./imagenes/tipo/'.strtolower($pokemon["tipo"]).'.png"></th>
                        <th>'.$pokemon["identificador_numerico"].'</th>
                        <th><a href="?nombre='.$pokemon["id"].'">'.$pokemon["nombre"].'</a></th>
                       </tr>';
    }

    $tablaHTML .= '</table>';

    return $tablaHTML;

}