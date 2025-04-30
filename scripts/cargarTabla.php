<?php

require_once ("MyDatabase.php");
function cargarTabla(){
    $database = new MyDatabase('localhost:3307', 'root', '', 'pokedex');

    $query = '';

    if (isset($_GET['tipo'])){
        $tipo = $_GET['tipo'];
        $query = "SELECT * FROM pokemon WHERE tipo = '$tipo' ORDER BY identificador_numerico";
    }else if (isset($_GET['identificador_numerico'])){
        $identificador_numerico = $_GET['identificador_numerico'];
        $query = "SELECT * FROM pokemon WHERE identificador_numerico = '$identificador_numerico'";
    }else if (isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        $query = "SELECT * FROM pokemon WHERE nombre = '$nombre'";
    }else $query = "SELECT * FROM pokemon ORDER BY identificador_numerico";

    $pokemonsCargados = $database->selectQuery($query);
    $tablaHTML='';
    $pokemonsHTML='';
    $opcionesAdminHTML='';
    $botonesBajaYModificacionAdminHTML='';
    $botonAltaAdminHTML='';

    if (count($pokemonsCargados) === 0){ // si la query no encontro nada, mostrar un error y abajo la tabla completa de pokemons
        $pokemonsCargados = $database->selectQuery("SELECT * FROM pokemon ORDER BY identificador_numerico");
        $tablaHTML .= "<h2 class='alert alert-danger text-center'>Pokemon no encontrado</h2>";
    }

    if(isset($_SESSION['dbId'])){
        $opcionesAdminHTML = '<th class="text-center">Acciones</th>';

        $botonAltaAdminHTML= '<a href="./alta-pokemon.php" class="w-100 p-3 mt-3 mb-3 btn btn-outline-primary">Nuevo Pokemon</a>';
    }


    foreach ($pokemonsCargados as $pokemon){


        if(isset($_SESSION['dbId'])){
            $atributoOnClick = 'onclick="return confirm(\'¿Estás seguro que quieres dar de baja al Pokémon '.$pokemon['nombre'].'?\')"'; // escapo comillas simples porque sino piensa que voy a citar otra variable
            $botonesBajaYModificacionAdminHTML = '<th>
                                                <div class="d-flex flex-column flex-md-row justify-content-evenly  pt-1">
                                                    <a href="./modificar-pokemon.php?id='.$pokemon["id"].'" class="btn btn-outline-primary p-1 p-md-2">Modificacion</a>
                                                    <a href="./scripts/procesar-baja.php?id='.$pokemon["id"].'" class="btn btn-outline-primary p-1 p-md-2 mt-2 mt-md-0" '.$atributoOnClick.'>Baja</a>
                                                </div>
                                               </th>';
        }

        $pokemonsHTML .= '<tr>
                        <th class="text-center align-middle">
                           <img class = "img-pokemon" src="'.$pokemon["imagen"].'">
                        </th>
                        <th class="text-center align-middle">
                           <img src="./imagenes/tipo/'.strtolower($pokemon["tipo"]).'.png">
                        </th>
                        <th class="text-center align-middle">
                           '.$pokemon["identificador_numerico"].'
                        </th>
                        <th class="text-center align-middle">
                           <a href="detalle.php?id='.$pokemon["id"].'">'.$pokemon["nombre"].'</a>
                        </th>
                       '.$botonesBajaYModificacionAdminHTML.'
                       </tr>';
    }

    $tablaHTML .='<h1 class="text-center">Lista de Pokemons</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Numero</th>
                            <th class="text-center">Nombre</th>
                            '.$opcionesAdminHTML.'
                        </tr>
                       '.$pokemonsHTML.'
                        </table>
                    </div>    
                    '.$botonAltaAdminHTML;

    return $tablaHTML;

}