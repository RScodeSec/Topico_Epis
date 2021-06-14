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
            <button id="NewCat" type="button" class="btn btn-primary" data-toggle="modal">Agregar Nuevo Categoria</button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="categoriatabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr id="tabla__head" class="table-h">
                            <th class="tabla__celda">#</th>
                            <th class="tabla__celda">Categoria</th>
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
<div class="modal fade" id="modalNewCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNewCat">
                <div class="modal-body">
                    <input type="text" id="id" name="id" value="0" hidden>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nombre del Categoria:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar" id="saveNewcategoria" class="btn btn-primary">
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
<script src="./js/categoria.js"></script>