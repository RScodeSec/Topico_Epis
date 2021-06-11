<?php
include_once "../Controller/session.php";
$session = new Session();

if (empty($_SESSION['nombres'])) {

    $session->redirect();
}
?>
<?php include_once "./layout/style.php"; ?>
<link rel="stylesheet" type="text/css" href="../view/css/style.css">
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<?php include_once "./layout/header.php"; ?>

<div class="container panel">
    <div class="row">
        <div class="col-lg-12">
            <button id="NewUser" type="button" class="btn btn-primary" data-toggle="modal">Agregar Nuevo Usuario</button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="productosTabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr id="tabla__head" class="table-h">
                            <th class="tabla__celda">#</th>
                            <th class="tabla__celda">Nombres</th>
                            <th class="tabla__celda">Usuario</th>
                            <th class="tabla__celda">DNI</th>
                            <th class="tabla__celda">Edad</th>
                            <th class="tabla__celda">Sexo</th>
                            <th class="tabla__celda">Peso</th>
                            <th class="tabla__celda">Talla</th>
                            <th class="tabla__celda">Opciones</th>
                            <!--<th class="tabla__celda">Eliminar</th>-->
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<!---- MODAL -->
<div class="modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNewUser">
                <div class="modal-body">
                    <input type="text" id="id" name="id" value="0" hidden>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombres:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Slecciona el Tipo de Usuario:</label><br>
                        <select class="form-select form-select-lg mb-6" id="typeUser" name="typeUser" aria-label="Default select example">
                            <option value="3">Estudiante</option>
                            <option value="2">Administrativo</option>
                            <option value="1">Docente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dni" class="col-form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                        <label for="age" class="col-form-label">Edad:</label>
                        <input type="text" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Selecciona Genero:</label><br>
                        <select class="form-select form-select-lg mb-6" id="gender" name="gender" aria-label="Default select example">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="peso" class="col-form-label">Peso:</label>
                        <input type="text" class="form-control" id="peso" name="peso" required>
                        <label for="talla" class="col-form-label">Talla:</label>
                        <input type="text" class="form-control" id="talla" name="talla" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" value="Guardar" id="saveNewUser" class="btn btn-primary">
                    </div>
            </form>
        </div>
    </div>
</div>










<?php
include_once "./layout/foother.php";
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/user.js"></script>


</body>

</html>