<div class="container">
    <h2> Zona de Administracion de Galerias</h2>
</div>
<div class="container panel">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevo1" type="button" class="btn btnSalir" data-toggle="modal">Agregar Imagen</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="galeria" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead>
                        <tr id="tabla__head">
                            <th class="tabla__celda">id</th>
                            <th class="tabla__celda">imagen</th>
                            <th class="tabla__celda">descripcion</th>
                            <th class="tabla__celda">Eliminar</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>





<!-- Modal-->
<div class="modal fade" id="modalCRUD1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-t">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" id="close" class="close modal-c" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <form id="formGaleria" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" id="id" name="id" value="0" hidden>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <div class="form-group">
                        <label for="user" class="col-form-label">Para Nombre:</label>
                        <br>
                        <select id="users" name="users" class="form-select form-select-lg mb-3 user">

                        </select>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <label for="descripcion" class="col-form-label">Imagen:</label><br>
                            <input name="files[]" type="file" id="file" accept=".jpg , .png , .webp" multiple required>

                        </div>
                        <!--<label for="descripcion" class="col-form-label">Imagen:</label>
                    <input  neme="file" type="file" id="file" class="dropify_" data-default-file="" accept=".jpg , .png , .webp" required>-->

                    </div>
                    <!--<div class="row">
                    <div id="file_" class="col-md-3"></div>
                
                    </div>-->

                </div>
                <div class="modal-footer">
                    <button type="button" id="Cancelar" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>