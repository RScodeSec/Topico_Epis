<?php
require_once dirname(dirname(__FILE__)) . '\Model\loginModel.php';
require_once 'session.php';
$sesion = new Session();

class UserController extends User
{

    public function login()
    {
        require_once "View/login.php";
    }

    public function verifylogin($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $infoUsuario = $this->searchUser();

        if ($infoUsuario) {
            foreach ($infoUsuario as $usuario) {
            }
            if ($username == $usuario->username) {
                if (password_verify($password, $usuario->password)) {

                    $_SESSION['username'] = $usuario->username;
                    $_SESSION['nombres'] = $usuario->nombres;
                    $_SESSION['rol'] = $usuario->rol;
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function logout()
    {
        session_destroy();

        header("location: ./../index.php");
    }

    public function actUpdatePass($old, $mynew)
    {
        ///
        $this->password = $old;
        $this->newpassword = $mynew;
        $infoUsuario = $this->SearchPass();
        foreach ($infoUsuario as $usuario) {
        }
        if (password_verify($old, $usuario->password)) {
            $infoUsuario = $this->userUpdatePass() ? 1 : 0;
            echo $infoUsuario;
        } else {
            echo 2;
        }
        //

    }
}


if (isset($_POST['opc']) && $_POST['opc'] == 'login') {
    $instanciaController = new UserController();

    $instanciaController->verifylogin($_POST['username'], $_POST['password']);
}
if (isset($_GET['opc']) && $_GET['opc'] == 'logout') {
    $instanciaController = new UserController();

    $instanciaController->logout();
}

if (isset($_POST['opc']) && $_POST['opc'] == 'actUpdatePass') {
    $instanciaController = new UserController();

    $instanciaController->actUpdatePass($_POST['oldpassword'], $_POST['newpassword']);
}
