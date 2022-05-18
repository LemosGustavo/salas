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
                     <h1 class="m-0 text-dark">Reserva</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                         <?php if ($textBtn == 'Eliminar') : ?>
                            <li class="breadcrumb-item active">Eliminar Reserva</li>
                        <?php else : ?>
                            <li class="breadcrumb-item active">Editar Reserva</li>
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
                        <h4>Eliminar Reserva</h4>
                        <?php else : ?>
                            <div class="card card-warning">
                            <div class="card-header">
                                <h4>Editar Reserva</h4>
                            <?php endif; ?>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <form role="form" method="post" enctype="multipart/form-data">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="estado_label">Salas</label>
                                             <select class="form-control select2" name="salas" style="width: 100%;">
                                                 <?php foreach ($selectSalas as $salas) : ?>
                                                     <?php if ($salas['id'] == $lista_reserva['sala_id']) :
                                                            $id_sala = $lista_reserva['sala_id'];
                                                            $nombre_sala = $salas['nombre_sala']; ?>
                                                         <option value="<?= $id_sala ?>" selected><?= $nombre_sala  ?> </option>
                                                     <?php else: ?>
                                                     <option value="<?= $salas['id'] ?>" ><?= $salas['nombre_sala']  ?> </option>
                                                     <?php endif; ?>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="persona_reserva_label">Reserva a Nombre de </label>
                                             <input type="text" class="form-control" name="persona_reserva" value="<?= old('persona_reserva', $lista_reserva['persona_reserva']) ?>" placeholder="Ingresar Nombre">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Fecha Desde:</label>
                                             <div class="input-group date" name="fechadesdedatetime" id="fechadesdedatetime" data-target-input="nearest">
                                                 <input type="text" name="fechadesdedatetime" value="<?= date_format(new DateTime(old('fechadesdedatetime', $lista_reserva['fecha_inicio'])), 'd/m/Y H:i')  ?>" class="form-control datetimepicker-input" data-target="#fechadesdedatetime" />
                                                 <div class="input-group-append" data-target="#fechadesdedatetime" data-toggle="datetimepicker">
                                                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Fecha Hasta:</label>
                                             <div class="input-group date" name="fechahastadatetime" id="fechahastadatetime" data-target-input="nearest">
                                                 <input type="text" name="fechahastadatetime" value="<?= date_format(new DateTime(old('fechahastadatetime', $lista_reserva['fecha_hasta'])), 'd/m/Y H:i') ?>" class="form-control datetimepicker-input" data-target="#fechahastadatetime" />
                                                 <div class="input-group-append" data-target="#fechahastadatetime" data-toggle="datetimepicker">
                                                     <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <label for="observacion">Observaciones </label>
                                             <textarea class="form-control" rows="3" name="observacion"placeholder="Observaciones..."><?= old('observacion', $lista_reserva['observacion']) ?></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row justify-content-between">
                                     <a type="button" class="btn btn-default" href="<?= base_url() ?>/reservas/listReservas">Volver</a>
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
 <script>
     $(document).ready(function() {
         $('#fechadesdedatetime, #fechahastadatetime').datetimepicker({
             icons: {
                 time: 'far fa-clock'
             },
             format: 'DD/MM/YYYY HH:mm:ss'
         });
     });
 </script>