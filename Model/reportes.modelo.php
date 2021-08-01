<?php

require_once dirname(dirname(__FILE__)). '\Core\database.php';
require_once "../Core/database.php";

class ModeloReportes{
		
	/*=============================================
	DESCARGAR REPORTE
	=============================================*/

	static public function mdlDescargarReporte($tabla){

		
        
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
		
		$stmt = null;
	
	
	
	}


	
}