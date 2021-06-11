<?php
require_once dirname(dirname(__FILE__)) . '\Model\userModel.php';
require_once 'session.php';
$sesion = new Session();

class UserController extends User
{
    public function SaveNewUser($name, $usertype, $dni, $age, $gender, $peso, $talla)
    {
        $this->nombres = $name;
        $this->user_level = $usertype;
        $this->dni = $dni;
        $this->edad = $age;
        $this->sexo = $gender;
        $this->peso = $peso;
        $this->talla = $talla;

        $infoUsuario = $this->saveInfoModelUser();
        echo $infoUsuario ? json_encode(['title' => 'Perfecto!', 'text' => 'Usuario agregado Correctamente', 'icon' => 'success']) :
            json_encode(['title' => 'Noo!', 'text' => 'No se Pudo Agregar al Usuario', 'icon' => 'error']);
    }
    public function listAllUser()
    {
        $infoUsuario = $this->listAllUsers();
        echo json_encode($infoUsuario);
    }
}


if (isset($_POST['opc']) && $_POST['opc'] == 'newUser') {
    $instanciaController = new UserController();

    $instanciaController->SaveNewUser($_POST['name'], $_POST['typeUser'], $_POST['dni'], $_POST['age'], $_POST['gender'], $_POST['peso'], $_POST['talla']);
}

if (isset($_GET['opc']) && $_GET['opc'] == 'listUser') {
    $instanciaController = new UserController();
    $instanciaController->listAllUser();
}
