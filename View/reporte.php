<?php

include_once "../Controller/session.php";


require_once "../Controller/reportes.controlador.php";
require_once "../Model/reportes.modelo.php";

require_once "../Controller/inventarioController.php";
require_once "../Model/inventarioModel.php";

require_once "../Controller/userController.php";
require_once "../Model/userModel.php";

$reporte = new ControladorReportes();
$reporte->ctrDescargarReporte();

?>