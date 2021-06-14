<?php
require_once dirname(dirname(__FILE__)) . '\Core\database.php';
class inventario
{
    protected $id;
    protected $nombre;
    protected $categoria;
    protected $composicion;
    protected $forma;
    protected $cantidad;
    protected $fecha;

    protected function saveInfoModelinvent()
    {
        $ic = new Conexion();

        $sql = "INSERT INTO inventario(nombre,categoria,composicion,forma,cantidad,fecha) VALUES(?,?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);
        $insertar->bindParam(1, $this->nombre);
        $insertar->bindParam(2, $this->categoria);
        $insertar->bindParam(3, $this->composicion);
        $insertar->bindParam(4, $this->forma);
        $insertar->bindParam(5, $this->cantidad);
        $insertar->bindParam(6, $this->fecha);
        return $insertar->execute();
    }

    protected function listAllUsers()
    {
        $ic = new Conexion();
        $sql = "SELECT 
        id,nombre,categoria,composicion,forma,cantidad,fecha
        FROM inventario";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

    protected function updatefoModelinvent()
    {
        $ic = new Conexion();

        $sql = "UPDATE inventario SET nombre='$this->nombre',categoria='$this->categoria',composicion='$this->composicion',forma='$this->forma',cantidad='$this->cantidad',fecha='$this->fecha' WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }

    protected function deleteInfoModelinvent()
    {
        $ic = new Conexion();

        $sql = "DELETE FROM inventario WHERE id='$this->id'";
        $insertar = $ic->db->prepare($sql);

        return $insertar->execute();
    }
}
