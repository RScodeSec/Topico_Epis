<?php
require_once dirname(dirname(__FILE__)). '\Core\database.php';
class User {
    protected $username;
    protected $password;

    protected function searchUser()
    {
        $ic = new Conexion();
        $sql = "SELECT * FROM users WHERE username='$this->username'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        if($consulta){
            $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetoConsulta;

        }
    }
}


?>