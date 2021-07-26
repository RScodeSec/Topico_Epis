<?php
require_once dirname(dirname(__FILE__)) . '\Model\categoriaModel.php';
require_once 'session.php';
$sesion = new Session();

class categoriaController extends cat
{
    public function saveNewcategoria($descripcion,$id)
    {
        $this->descripcion = $descripcion;
        $this->id = $id;
        
        if ($id == 0) {
            $infoUsuario = $this->saveInfoModelcat();
            echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Categoria agregado Correctamente', 'icon' => 'success']) :
                json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Agregar la Categoria', 'icon' => 'error']);
        } else {
            $infoUsuario = $this->updatefoModelcat();
            echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Categoria Actualizado Correctamente', 'icon' => 'success']) :
                json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Actualizar la Categoria', 'icon' => 'error']);
        }
    }
    public function listAllcat()
    {
        $infoUsuario = $this->listAllUsers();
        echo json_encode($infoUsuario);
    }
    public function deleteNewcat($id)
    {
        $this->id = $id;
        $infoUsuario = $this->deleteInfoModelcat();
        echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Medicamento Eliminado Correctamente', 'icon' => 'success']) :
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Eliminar el Medicamento', 'icon' => 'error']);
    }
}


if (isset($_POST['opc']) && $_POST['opc'] == 'newCat') {
    $instanciaController = new categoriaController();

    $instanciaController->saveNewCategoria($_POST['descripcion'],  $_POST['id']);
}

if (isset($_GET['opc']) && $_GET['opc'] == 'listCat') {
    $instanciaController = new categoriaController();
    $instanciaController->listAllcat();
}

if (isset($_POST['opc']) && $_POST['opc'] == 'deletecat') {
    $instanciaController = new categoriaController();

    $instanciaController->deleteNewcat($_POST['id']);
    
}

