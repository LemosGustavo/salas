
<div class="modal-header">
    <h4 class="modal-title">Agregar Sala</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <form role="form">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nombre_label">Nombre</label>
                    <input type="nombre" class="form-control" id="nombre" placeholder="Ingresar Nombre">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="ubicacion_label">Ubicación</label>
                    <input type="ubicacion" class="form-control" id="ubicacion" placeholder="Ingresar Ubicación">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="descripcion_label">Descripción</label>
                    <input type="descripcion" class="form-control" id="descripcion" placeholder="Ingresar Descripción">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <input type="estado" class="form-control" id="estado">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </form>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
</div>

