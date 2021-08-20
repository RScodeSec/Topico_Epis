<?php


include_once "../Controller/session.php";
$session = new Session();

if (empty($_SESSION['nombres'])) {

    $session->redirect();
}
include_once "./layout/header.php";
?>

<div class="card">
    <h2><strong>  Genere tus Reportes </strong> <?php echo $_SESSION['nombres'] ?> </h2>
</div>


                                                <div class="container">
                                                     <!-- REPORTE DE MEDICAMENETOS -->
                                                    <div class="card fb-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-medical-sign"></i>
                                                            
                                                            <div class="d-inline-block">
                                                                <h5>REPORTE DE MEDICAMENTOS Y CATEGORIAS</h5>
                                                                <span>Panel de reportes</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                      
                                                                <div class="col-6">
                                                                    <i class="icofont icofont-checked"></i>
                                                                    <p class="text-muted">Generar reporte de: </p>
                                                                    <h4>CATEGORIAS</h4>
                                                                    <a href="reporte.php?reporte=categoria"><button type="button" class="btn btn-primary">Generar Reporte</button></a>
                                                                    
                                                                </div>
                                                                <div class="col-6">
                                                                    <i class="icofont icofont-dice"></i>
                                                                    <p class="text-muted">Generar reporte de: </p>
                                                                    <h4>MEDICAMENTOS</h4>
                                                                    <a href="reporte.php?reporte=inventario"><button type="button" class="btn btn-primary">Generar Reporte</button></a>
                                                                    
                                                                </div>
                                                                
                                                       
                                                            </div>
                                                        </div>
                                                
                                                    </div>
                                                   
                                                     <!-- REPORTE DE USUARIOS-->
                                                    <div class="card fb-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-ui-user"></i>
                                                            <div class="d-inline-block">
                                                            
                                                                <h5>REPORTE DE USUARIOS</h5>
                                                               
                                                                <span>Panel de reportes</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                      
                                                                <div class="col-12">
                                                                     <i class="icofont icofont-users-alt-5"></i>
                                                                    <p class="text-muted">Generar reporte de: </p>
                                                                    <h4>ESTUDIANTES ADMINISTRATIVOS Y DOCENTES</h4>
                                                                    <a href="reporte.php?reporte=usuarios"><button type="button" class="btn btn-primary">Generar Reporte</button></a>
                                                                
                                                                </div>

                                                                                                                                                                   
                                                       
                                                            </div>
                                                        </div>
                                                
                                                    </div>


                                                </div>


<?php
include_once "./layout/foother.php";
?>
<script src="./js/index.js"></script>


</body>

</html>