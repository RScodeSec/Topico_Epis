<?php
require_once dirname(dirname(__FILE__)) . '\Core\database.php';
class cat
{
    protected $id;
    protected $descripcion;


    protected function saveInfoModelcat()
    {
        $ic = new Conexion();

        $sql = "INSERT INTO categoria(descripcion) VALUES(?)";
        $insertar = $ic->db->prepare($sql);
        $insertar->bindParam(1, $this->descripcion);
        return $insertar->execute();
    }

    protected function listAllUsers()
    {
        $ic = new Conexion();
        $sql = "SELECT 
        id, descripcion FROM categoria";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

    protected function updatefoModelcat()
    {
        $ic = new Conexion();

        $sql = "UPDATE categoria SET descripcion='$this->descripcion' WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }

    protected function deleteInfoModelcat()
    {
        $ic = new Conexion();

        $sql = "DELETE FROM categoria WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }
}