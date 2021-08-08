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
            <button id="NewInvent" type="button" class="btn btn-primary" data-toggle="modal">Agregar Nuevo Medicamento</button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="inventariotabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr id="tabla__head" class="table-h">
                            <th class="tabla__celda">#</th>
                            <th class="tabla__celda">Producto</th>
                            <th class="tabla__celda">Categoria</th>
                            <th class="tabla__celda">Composicion</th>
                            <th class="tabla__celda">forma</th>
                            <th class="tabla__celda">Cantidad</th>
                            <th class="tabla__celda">Fecha Registro</th>
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
<div class="modal fade" id="modalNewInvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNewInvent">
                <div class="modal-body">
                    <input type="text" id="id" name="id" value="0" hidden>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                        <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[A-Za-z0-9 ]+" title="Escriba el nombre del producto" placeholder="Descripcion">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                        <select class="form-control" id="categoria" name="categoria" aria-label="Default select example">
                            <option value="">Seleccionar Categoria</option>

                        </select>

                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control" id="composicion" name="composicion" placeholder="Composicion" title="Debe estar en ml, cm"required pattern="[A-Za-z0-9 ]+">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <input type="text" class="form-control" id="forma" name="forma" placeholder="Forma" title="Puede ser caja, botella, tabletas, etc." required pattern="[a-zA-Z ]+">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Stock" title="La cantidad de producto debe ser numero entero"required pattern="^[0-9]+">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control" id="fecha" name="fecha" required title="Es necesario poner la fecha">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar" id="saveNewinventario" class="btn btn-primary">
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
<script src="./js/inventario.js"></script>