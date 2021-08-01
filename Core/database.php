<?php

class Conexion{
    
    public $db;


    public static function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=topico", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND                                                                   => "SET NAMES utf8"));
        return $link;
    }

    public function __construct()
    {
        $host = "localhost";
        $dbname = "topico";
        $username = "root";
        $password = "";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
        } 
        catch (PDOException $th) {
            echo "Error: ". $th->getMessage();
        }

    }
    public function CloseConexion()
    {
        $this->db = null;
    }
}


?>