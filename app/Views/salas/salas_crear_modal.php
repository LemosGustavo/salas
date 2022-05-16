<?php echo form_open()?>
<div class="modal-header">
    <h4 class="modal-title">Agregar Sala</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <form role="form" method="POST" enctype="multipart/form-data">
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
                    <label for="estado_label">Estado</label>
                    <select class="form-control select2" name="estado" style="width: 100%;">
                        <option value="">Seleccionar Estado</option>
                        <option value="1">Habilitar</option>
                        <option value="0">Deshabilitar</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
        <!-- /.card-body -->
    </form>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>

<?php echo form_submit()?>
<?php echo form_close()?>
