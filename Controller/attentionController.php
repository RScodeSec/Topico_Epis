<?php
require_once dirname(dirname(__FILE__)) . '\Model\attentionModel.php';
require_once 'session.php';
$sesion = new Session();

class UserAttention extends Attention
{

    public function searchUser($dni)
    {
        $this->dni = $dni;
        $infoUsuario = $this->userSearch();

        echo json_encode($infoUsuario);
    }

    public function searchDrug($drug)
    {
        $this->nameDrug = $drug;
        $infoUsuario = $this->drugSearch();

        echo json_encode($infoUsuario);
    }

    public function saveAttention($dni, $diag, $tratm, $drug, $quanty)
    {
        $this->dni = $dni;
        $this->diagnostico = $diag;
        $this->tratamiento = $tratm;
        $this->idDrug = $drug;
        $this->cantidad = $quanty;
        $this->hora = date("H:i:s");
        $this->fecha = date("d-m-Y");
        $infoUsuario = $this->saveDetailsAttention() ? 1 : 0;

        echo json_encode($infoUsuario);
    }
}


if (isset($_GET['opc']) && $_GET['opc'] == 'us') {
    $instanciaController = new UserAttention();

    $instanciaController->searchUser($_GET["dni"]);
}

if (isset($_GET['opc']) && $_GET['opc'] == 'searchDrug') {
    $instanciaController = new UserAttention();

    $instanciaController->searchDrug($_GET["nameDrug"]);
}

if (isset($_POST['opc']) && $_POST['opc'] == 'saveAttention') {
    $instanciaController = new UserAttention();

    $instanciaController->saveAttention($_POST["dni"], $_POST["diag"], $_POST["trat"], $_POST["drug"], $_POST["quant"]);
}
