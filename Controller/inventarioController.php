<?php
require_once dirname(dirname(__FILE__)) . '\Model\inventarioModel.php';
require_once 'session.php';
$sesion = new Session();

class inventarioController extends inventario
{
    public function saveNewinventario($nombre, $composicion, $forma, $cantidad, $fecha, $id)
    {
        $this->nombre = $nombre;
        $this->composicion = $composicion;
        $this->forma = $forma;
        $this->cantidad = $cantidad;
        $this->fecha = $fecha;
        $this->id = $id;
        if ($id == 0) {
            $infoUsuario = $this->saveInfoModelinvent();
            echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Medicamento agregado Correctamente', 'icon' => 'success']) :
                json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Agregar el Medicamentos', 'icon' => 'error']);
        } else {
            $infoUsuario = $this->updatefoModelinvent();
            echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Medicamento Actualizado Correctamente', 'icon' => 'success']) :
                json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar el Medicamentos', 'icon' => 'error']);
        }
    }
    public function listAllinvent()
    {
        $infoUsuario = $this->listAllUsers();
        echo json_encode($infoUsuario);
    }
    public function deleteNewinvent($id)
    {
        $this->id = $id;
        $infoUsuario = $this->deleteInfoModelinvent();
        echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Medicamento Eliminado Correctamente', 'icon' => 'success']) :
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Eliminar el Medicamento', 'icon' => 'error']);
    }
}


if (isset($_POST['opc']) && $_POST['opc'] == 'NewInvent') {
    $instanciaController = new inventarioController();

    $instanciaController->saveNewinventario($_POST['name'], $_POST['composicion'], $_POST['forma'], $_POST['cantidad'], $_POST['fecha'], $_POST['id']);
}

if (isset($_GET['opc']) && $_GET['opc'] == 'listInvent') {
    $instanciaController = new inventarioController();
    $instanciaController->listAllinvent();
}

if (isset($_POST['opc']) && $_POST['opc'] == 'deleteinvent') {
    $instanciaController = new inventarioController();

    $instanciaController->deleteNewinvent($_POST['id']);
}
