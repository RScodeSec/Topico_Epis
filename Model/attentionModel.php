<?php
require_once dirname(dirname(__FILE__)) . '\Core\database.php';
class Attention
{
    protected $id;
    protected $dni;
    protected $nameDrug;
    protected $diagnostico;
    protected $tratamiento;
    protected $idDrug;
    protected $cantidad;
    protected $hora;
    protected $fecha;


    protected function saveDetailsAttention()
    {
        $ic = new Conexion();
        $sql = "CALL sp_miatension(?,?,?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);

        /*$sql = "INSERT INTO atencion_estudiante(hora_add,id_estudiante,fecha_atencion,diagnostico,tratamiento,idMedicamento,cantMedicamento) VALUES(?,?,?,?,?,?,?)";
        $insertar = $ic->db->prepare($sql);*/
        $insertar->bindParam(1, $this->hora);
        $insertar->bindParam(2, $this->dni);
        $insertar->bindParam(3, $this->fecha);
        $insertar->bindParam(4, $this->diagnostico);
        $insertar->bindParam(5, $this->tratamiento);
        $insertar->bindParam(6, $this->idDrug);
        $insertar->bindParam(7, $this->cantidad);
        return $insertar->execute();
    }

    protected function userSearch()
    {
        $ic = new Conexion();
        $sql = "select * from usuarios WHERE dni='$this->dni'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $objetoConsulta;
    }

    protected function drugSearch()
    {
        $ic = new Conexion();
        $sql = "select * from inventario WHERE nombre  LIKE '$this->nameDrug%'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $objetoConsulta;
    }
}
