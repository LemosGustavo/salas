<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php if (session('error')) : ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                <p><?= session('error') ?></p>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Salas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Crear Salas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Agregar Salas</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nombre_label">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Ingresar Nombre">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ubicacion_label">Ubicación</label>
                                            <input type="text" class="form-control" name="ubicacion" placeholder="Ingresar Ubicación">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="descripcion_label">Descripción</label>
                                            <input type="text" class="form-control" name="descripcion" placeholder="Ingresar Descripción">
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
                                <div class="row justify-content-between">
                                    <a type="button" class="btn btn-default" href="<?= base_url() ?>/salas/listSalas">Volver</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->