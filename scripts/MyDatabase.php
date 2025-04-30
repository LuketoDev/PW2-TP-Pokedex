<?php

class MyDatabase
{
    private $database;

    public function __construct($localhost = null, $username = null, $password = null, $database = null)
    {
        if ($localhost === null && $username === null && $password === null && $database === null){

            $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/TP-Pokedex/db/database.ini');

            $this->database = new mysqli(
                $config['host'],
                $config['user'],
                $config['pass'],
                $config['db']
            );
        } else {
            $this->database = new mysqli($localhost, $username, $password, $database);
        }
    }

    public function selectQuery($query)
    {
        $datos = $this->database->query($query);
        return $datos->fetch_all(MYSQLI_ASSOC);
    }

    public function executeQuery($query)
    {
        return $this->database->query($query);
    }

    public function __destruct(){
        $this->database->close();
    }
}