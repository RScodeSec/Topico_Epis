<?php
require_once dirname(dirname(__FILE__)) . '\Core\database.php';
class User
{
    protected $username;
    protected $password;
    /// add credentials
    protected $newpassword;

    protected function searchUser()
    {
        $ic = new Conexion();
        $sql = "SELECT * FROM users WHERE username='$this->username'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        if ($consulta) {
            $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetoConsulta;
        }
    }

    protected function SearchPass()
    {
        $ic = new Conexion();
        $sql = "SELECT password FROM users ";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        //if ($consulta) {
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
        //}
    }
    protected function userUpdatePass()
    {
        $ic = new Conexion();
        $mm = password_hash($this->newpassword, PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = '$mm'";
        $consulta = $ic->db->prepare($sql);
        return $consulta->execute();
    }
}
