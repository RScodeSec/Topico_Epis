<?php
include_once "../Controller/session.php";
$session = new Session();

if (empty($_SESSION['nombres'])) {

    $session->redirect();
}
?>
<?php include_once "./layout/style.php"; ?>
<link rel="stylesheet" type="text/css" href="../view/css/attention.css">
<!--<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">-->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<?php include_once "./layout/header.php"; ?>

<div class="card">
    <div class="card-container">
        <div class="findUser">
            <h5>Atención</h5>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="find-dni" placeholder="Ingrese N° DNI" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="searchUser">Buscar Usuario</button>
                <!--<input type="text" class="form-control" placeholder="Recipient's username">-->
            </div>
        </div>
        <div class="userDetails">
            <h5 class="myinfo"> Detalles del Usuario</h5>

            <div class="showDetails">


                <form>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="dni">N° DNI</label>
                            <input type="text" class="form-control" id="dni" readOnly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Nombres</label>
                            <input type="text" class="form-control" id="name" readOnly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="age">Edad</label>
                            <input type="text" class="form-control" id="age" readOnly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="peso">Peso</label>
                            <input type="text" class="form-control" id="peso" readOnly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="talla">Talla</label>
                            <input type="text" class="form-control" id="talla" readOnly>
                        </div>
                    </div>

                </form>
            </div>

        </div>


        <div class="row diagnostic">
            <div class="col-4">
                <h5>Diagnostico</h5>
                <div class="form-group">
                    <label for="diagnostico">Redacte el Diagnostico</label>
                    <textarea class="form-control" id="diagnostico" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tratamiento">Redacte el Tratamiento </label>
                    <textarea class="form-control" id="tratamiento" rows="2" required></textarea>
                </div>
            </div>
            <div class="col-8">
                <h5>Medicamentos</h5>
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" id="buttonAddDrug" data-toggle="modal" data-target="#exampleModal">Agregar Medicamentos</button>
                        <button type="button" class="btn btn-danger" id="buttonCleanDrug">Limpiar Medicamentos</button>
                    </div>
                </div>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cant.</th>
                        </tr>
                    </thead>
                    <tbody id="cleanRecDrug">


                    </tbody>
                </table>
            </div>


        </div>
        <div class="finalizar">
            <button type="button" id="btnSaveaIn" class="btn btn-primary gamela">Finalizar Atencion</button>

        </div>




    </div>
</div>








<!-- Modal :___________ -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar Medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="drug">Ingrese Nombre de Medicamento</label>
                    <input type="text" class="form-control" id="drug" placeholder="Ingrese Nombre de Medicamento">
                </div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Composicion</th>
                            <th scope="col">Forma</th>
                            <th scope="col">Cant</th>
                        </tr>
                    </thead>
                    <tbody id="contentResultDrugs">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>




<?php
include_once "./layout/foother.php";
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/attention.js"></script>
</body>

</html>