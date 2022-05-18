<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <?php if (session('message')) : ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> OK!</h5>
                <?= session('message') ?>
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
                        <li class="breadcrumb-item active">Salas</li>
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
                    <div class="card">
                        <div class="card-header">
                            <!--     <a data-remote="false" data-toggle="modal" data-target="#remote_modal_lg" href="<?php // base_url() 
                                                                                                                        ?>/salas/crearSalasModal" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a>-->
                            <a href="<?= base_url() ?>/salas/crearSalas" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nombre Sala</th>
                                        <th>Descripción</th>
                                        <th>Ubicación</th>
                                        <th>Estado</th>
                                        <th>Fecha Creación</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista_salas as $salas) : ?>
                                        <tr>
                                            <td><?= $salas['nombre_sala'] ?></td>
                                            <td><?= $salas['ubicacion'] ?></td>
                                            <td><?= $salas['descripcion'] ?></td>
                                            <td><?= ($salas['estado_sala'] == 1) ? '<i class="fa fa-check text-green">Habilitado</i>' : '<i class="fa fa-times text-red">Deshabilitado</i>'; ?></td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s',  $salas['fecha_creacion']), 'd/m/Y H:i:s') ?></td>
                                            <td><a href="<?= base_url() ?>/salas/editarSalas/<?= $salas['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url() ?>/salas/eliminarSalas/<?= $salas['id'] ?>" class="btn btn-danger"><i class="fas fa-eraser"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- card-footer -->
                        <div class="card-footer">
                            <div class="row justify-content-between">
                                <a type="button" class="btn btn-default" href="<?= base_url() ?>">Volver</a>
                            </div>
                        </div>
                        <!-- /.card-footer -->
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
<div class="modal fade" id="remote_modal_lg" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#remote_modal_lg").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });
        $('#remote_modal_lg').on("hidden.bs.modal", function(e) {
            $(this).find(".modal-content").empty();
        });
    });
</script>