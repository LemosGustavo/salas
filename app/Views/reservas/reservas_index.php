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
                    <h1 class="m-0 text-dark">Reservas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Reservas</li>
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
                            <a href="<?= base_url() ?>/reservas/crearReservas" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nombre Sala</th>
                                        <th>Reserva de Persona </th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Hasta</th>
                                        <th>Estado</th>
                                        <th>Fecha Creación</th>
                                        <th>Fecha Actualizada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lista_reservas as $reserva) : ?>
                                        <tr>
                                            <td><?= $reserva->nombre  ?></td>
                                            <td><?= $reserva->persona_reserva  ?></td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $reserva->fecha_inicio), 'd/m/Y H:i:s') ?></td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $reserva->fecha_hasta), 'd/m/Y H:i:s')  ?></td>
                                            <td><?= ($reserva->estado == 1) ? '<i class="fa fa-check text-green">Reservado</i>' : '<i class="fa fa-times text-red">Cancelado</i>'; ?></td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $reserva->fecha_creacion), 'd/m/Y H:i:s') ?></td>
                                            <td><?= ($reserva->fecha_actualizacion != '0000-00-00 00:00:00') ? date_format(DateTime::createFromFormat('Y-m-d H:i:s', $reserva->fecha_actualizacion), 'd/m/Y H:i:s') : '' ?></td>
                                            <td><a href="<?= base_url() ?>/reservas/editarReservas/<?= $reserva->reserva_id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url() ?>/reservas/eliminarReservas/<?= $reserva->reserva_id ?>" class="btn btn-danger"><i class="fas fa-eraser"></i></a>
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