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
                        <?php if ($textBtn == 'Eliminar') : ?>
                            <li class="breadcrumb-item active">Eliminar Sala</li>
                        <?php else : ?>
                            <li class="breadcrumb-item active">Editar Sala</li>
                        <?php endif; ?>
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
                    <?php if ($textBtn == 'Eliminar') : ?>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Eliminar Sala</h4>
                                <?php else : ?>
                        <div class="card card-warning">
                            <div class="card-header">
                                <h4>Editar Sala</h4>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <?php ?>
                                            <label for="nombre_label">Nombre</label>
                                            <input type="text" class="form-control" name="nombre" value="<?= old('nombre', $lista_sala['nombre_sala']) ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ubicacion_label">Ubicación</label>
                                            <input type="text" class="form-control" name="ubicacion" value="<?= old('nombre', $lista_sala['ubicacion']) ?>" placeholder="Ingresar Ubicación">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="descripcion_label">Descripción</label>
                                            <input type="text" class="form-control" name="descripcion" value="<?= old('nombre', $lista_sala['descripcion']) ?>" placeholder="Ingresar Descripción">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="estado_label">Estado</label>
                                            <select class="form-control select2" name="estado" style="width: 100%;">
                                                <option value="<?= old('nombre', $lista_sala['estado_sala']) ?>"><?= (old('nombre', $lista_sala['estado_sala'])) ? "Habilitar" : "Deshabilitar" ?></option>
                                                <?php if ($lista_sala['estado_sala'] == 1) : ?>
                                                    <option value="0">Deshabilitar</option>
                                                <?php else : ?>
                                                    <option value="1">Habilitar</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <a type="button" class="btn btn-default" href="<?= base_url() ?>/salas/listSalas">Volver</a>
                                    <?php if ($textBtn == 'Eliminar') : ?>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <?php else : ?>
                                        <button type="submit" class="btn btn-warning">Editar</button>
                                    <?php endif; ?>
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