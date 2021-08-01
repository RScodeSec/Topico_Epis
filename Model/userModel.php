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
        usuarios.id ,usuarios.nombres, usuario_grupo.group_name,usuarios.dni,usuarios.edad,usuarios.sexo,usuarios.peso,usuarios.talla,usuarios.user_level 
        FROM usuarios 
        INNER JOIN usuario_grupo 
        ON usuarios.user_level = usuario_grupo.id";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

    protected function updatefoModelUser()
    {
        $ic = new Conexion();

        $sql = "UPDATE usuarios SET nombres='$this->nombres',user_level='$this->user_level',dni='$this->dni',edad='$this->edad',sexo='$this->sexo',peso='$this->peso',talla='$this->talla' WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }

    protected function deleteInfoModelUser()
    {
        $ic = new Conexion();

        $sql = "DELETE FROM usuarios WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }
    protected function getDataDashboard()
    {
        $ic = new Conexion();
        $sql = "SELECT  (
            SELECT COUNT(*)
            FROM   usuarios
        ) AS numUser,
        (
            SELECT COUNT(*)
            FROM inventario
        ) AS numStock,
        (
            SELECT COUNT(*)
            FROM historial          
        ) AS numAttention";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

    protected function searchIfExist()
    {
        $ic = new Conexion();
        $sql = "SELECT nombres FROM usuarios WHERE dni = '$this->dni'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        //$objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        $cuenta = $consulta->rowCount();
        //return $objetoConsulta;
        return $cuenta;
    }
}
