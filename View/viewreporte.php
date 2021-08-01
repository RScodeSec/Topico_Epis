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
                                                    <div class="card fb-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-social-facebook"></i>
                                                            <div class="d-inline-block">
                                                                <h5>facebook</h5>
                                                                <span>blog page timeline</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                      
                                                                <div class="col-6">
                                                                
                                                                    <p class="text-muted">Generar reporte de: </p>
                                                                    <h4>CATEGORIAS</h4>
                                                                    <a href="reporte.php?reporte=categoria"><button type="button" class="btn btn-primary">Generar Reporte</button></a>
                                                                    
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="text-muted">Generar reporte de: </p>
                                                                    <h4>PRODUCTOS</h4>
                                                                    <a href="reporte.php?reporte=inventario"><button type="button" class="btn btn-primary">Generar Reporte</button></a>
                                                                    
                                                                </div>
                                                       
                                                            </div>
                                                        </div>
                                                
                                                    </div>




                                                    <div class="card fb-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-social-facebook"></i>
                                                            <div class="d-inline-block">
                                                                <h5>REPORTE DE USUARIOS</h5>
                                                                <span>Escuela Profesional de ingenieria de sistemas</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                      
                                                                <div class="col-12">
                                                                
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