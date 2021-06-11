<?php
require_once dirname(dirname(__FILE__)) . '\Core\database.php';
class User
{
    protected $id;
    protected $nombres;
    protected $user_level;
    protected $dni;
    protected $edad;
    protected $sexo;
    protected $peso;
    protected $talla;

    protected function saveInfoModelUser()
    {
        $ic = new Conexion();

        $sql = "INSERT INTO usuarios(nombres,user_level,dni,edad,sexo,peso,talla) VALUES(?,?,?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);
        $insertar->bindParam(1, $this->nombres);
        $insertar->bindParam(2, $this->user_level);
        $insertar->bindParam(3, $this->dni);
        $insertar->bindParam(4, $this->edad);
        $insertar->bindParam(5, $this->sexo);
        $insertar->bindParam(6, $this->peso);
        $insertar->bindParam(7, $this->talla);
        return $insertar->execute();
    }

    protected function listAllUsers()
    {
        $ic = new Conexion();
        $sql = "SELECT 
        usuarios.nombres, usuario_grupo.group_name,usuarios.dni,usuarios.edad,usuarios.sexo,usuarios.peso,usuarios.talla 
        FROM usuarios 
        INNER JOIN usuario_grupo 
        ON usuarios.user_level = usuario_grupo.id";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}
