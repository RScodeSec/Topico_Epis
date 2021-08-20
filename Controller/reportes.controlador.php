<?php

error_reporting(0);



class ControladorReportes
{

 
    public function ctrDescargarReporte()
    {

        if (isset($_GET["reporte"])) {

            $tabla = $_GET["reporte"];

            $reporte = ModeloReportes::mdlDescargarReporte($tabla);

            /*=============================================
            CREAMOS EL ARCHIVO DE EXCEL
            =============================================*/

            $nombre = $_GET["reporte"] . '.xls';

            header('Expires: 0');
            header('Cache-control: private');
            header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
            header("Cache-Control: cache, must-revalidate");
            header('Content-Description: File Transfer');
            header('Last-Modified: ' . date('D, d M Y H:i:s'));
            header("Pragma: public");
            header('Content-Disposition:; filename="' . $nombre . '"');
            header("Content-Transfer-Encoding: binary");

            if ($_GET["reporte"] == "inventario") {

                echo utf8_decode("

					<table border='0'>

						<tr>
                            <h2>MEDICAMENTOS</h2>
							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Producto</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Categoria</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Composicion</td>
							<td style='font-weight:bold; border:1px solid #eee;'>forma</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Cantidad</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Fecha Registro</td>

                                                 
                        </tr>




						</tr>");

                foreach ($reporte as $key => $value) {
                   

                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombre"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["categoria"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["composicion"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["forma"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["cantidad"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["fecha"] . "</td>

			 					  	 </tr>");

                }

                echo utf8_decode("</table>

					");

            }


            if ($_GET["reporte"] == "usuarios") {

                
                echo utf8_decode("

					<table border='0'>

						<tr>

                            <h2>ESTUDIANTES </h2>
							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Nombres</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Edad</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Sexo</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Peso</td>
                            <td style='font-weight:bold; border:1px solid #eee;'>Talla</td>

                                                 
                        </tr>




						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/

                   
                if ($value["user_level"] == "3") {

                    // estudianye
                   
                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombres"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["dni"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["edad"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["sexo"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["peso"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["talla"] . "</td>
                                

			 					  	 </tr>");

                }

                }

                echo utf8_decode("</table>

					");

            }

            
            if ($_GET["reporte"] == "usuarios") {

        
                echo utf8_decode("


               
                

					<table border='0'>
                                    
            
                        
						<tr>
                
                             <H2>ADMINISTRATIVOS</H2>
							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Nombres</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Edad</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Sexo</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Peso</td>
                            <td style='font-weight:bold; border:1px solid #eee;'>Talla</td>

                                                 
                        </tr>




						</tr>");

                foreach ($reporte as $key => $value) {

                   
                   
                if ($value["user_level"] == "2") {

                    // administrativo
                   
                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombres"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["dni"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["edad"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["sexo"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["peso"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["talla"] . "</td>
                                

			 					  	 </tr>");

                }

                }

                echo utf8_decode("</table>

					");

            }

            if ($_GET["reporte"] == "usuarios") {

                echo utf8_decode("

					<table border='0'>

						<tr>
                            <h2>DOCENTES</h2>
							<td style='font-weight:bold; border:1px solid #eee;'>ID</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Nombres</td>
							<td style='font-weight:bold; border:1px solid #eee;'>DNI</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Edad</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Sexo</td>
							<td style='font-weight:bold; border:1px solid #eee;'>Peso</td>
                            <td style='font-weight:bold; border:1px solid #eee;'>Talla</td>

                                                 
                        </tr>




						</tr>");

                foreach ($reporte as $key => $value) {

                    /*=============================================
                    TRAER PRODUCTO
                    =============================================*/

                   
                if ($value["user_level"] == "1") {

                    // docentes
                   
                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							<td style='border:1px solid #eee;'>" . $value["nombres"] . "</td>

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["dni"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["edad"] . "</td>
			 					  	 <td style='border:1px solid #eee;'>" . $value["sexo"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["peso"] . "</td>
			 					  	  <td style='border:1px solid #eee;'>" . $value["talla"] . "</td>
                                

			 					  	 </tr>");

                }

                }

                echo utf8_decode("</table>

					");

            }


            if ($_GET["reporte"] == "categoria") {

                echo utf8_decode("

					<table border='0'>

						<tr>
                            <h2>CATEGORIA MEDICAMENTOS</h2>
							<td style='font-weight:bold; border:1px solid #eee;'>CODIGO</td>
							<td style='font-weight:bold; border:1px solid #eee;'>NOMBRE CATEGORIA</td>
                                                 
                        </tr>




						</tr>");

                foreach ($reporte as $key => $value) {

   

                   
               

                    // categoria
                   
                    echo utf8_decode("

					 	<tr>
							<td style='border:1px solid #eee;'>" . $value["id"] . "</td>
							

					 ");

                    echo utf8_decode("<td style='border:1px solid #eee;'>" . $value["descripcion"] . "</td>
			 				                               

			 					  	 </tr>");

                

                }

                echo utf8_decode("</table>

					");

            }



        }

    }

}
