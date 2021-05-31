<?php
require_once dirname(dirname(__FILE__)) .'\Model\loginModel.php';
require_once 'session.php';
$sesion = new Session();

class UserController extends User {

    public function login()
    {
        require_once "View/login.php";        
    }

    public function verifylogin($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $infoUsuario = $this->searchUser();

        if($infoUsuario){
            foreach($infoUsuario as $usuario){}
            if($username == $usuario->username){
                if(password_verify($password, $usuario->password)){

                    $_SESSION['username'] = $usuario->username;
                    $_SESSION['nombres'] = $usuario->nombres;
                    $_SESSION['rol'] = $usuario->rol;
                    echo 1;
                }
                else{
                    echo 0;
                }
            }
            else{
                echo 0;
            }
            
            
           
        }
        else
        {
            echo 0;
        }
        
    }

    public function logout()
    {
        session_destroy();

        header("location: ./../index.php");
    }
    
}


if(isset($_POST['opc']) && $_POST['opc']=='login')
{
    $instanciaController = new UserController();
    
    $instanciaController->verifylogin($_POST['username'], $_POST['password']);

}
if(isset($_GET['opc']) && $_GET['opc']=='logout')
{
    $instanciaController = new UserController();
    
    $instanciaController->logout();

}


?>