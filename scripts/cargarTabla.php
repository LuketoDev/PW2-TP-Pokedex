<?php
include_once ("MyDatabase.php");
function cargarTabla(){
    $database = new MyDatabase('localhost:3307', 'root', '', 'pokedex');

    $pokemonsCargados = $database->query("SELECT * FROM pokemon");

    $tablaHTML = '<table class="table table-striped">
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