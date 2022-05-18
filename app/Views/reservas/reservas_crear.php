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
                         <li class="breadcrumb-item active">Crear Reserva</li>
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
                             <h4>Agregar Reserva</h4>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <form role="form" method="post" enctype="multipart/form-data">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="estado_label">Salas</label>
                                             <select class="form-control select2" name="salas" style="width: 100%;">
                                                 <option value="">Seleccionar Salas</option>
                                                 <?php foreach ($selectSalas as $salas) : ?>
                                                     <option value="<?= $salas['id'] ?>"><?= $salas['nombre_sala'] ?> </option>
                                                 <?php endforeach; ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="persona_reserva_label">Reserva a Nombre de </label>
                                             <input type="text" class="form-control" name="persona_reserva" placeholder="Ingresar Nombre">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label>Fecha Desde:</label>
                                             <div class="input-group date" name="fechadesdedatetime" id="fechadesdedatetime" data-target-input="nearest">
                                                 <input type="text" name="fechadesdedatetime" class="form-control datetimepicker-input" data-target="#fechadesdedatetime" />
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
                                                 <input type="text" name="fechahastadatetime" class="form-control datetimepicker-input" data-target="#fechahastadatetime" />
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
                                             <label for="observaciones_label">Observaciones </label>
                                             <textarea class="form-control" rows="3" name="observaciones" placeholder="Observaciones..."></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row justify-content-between">
                                     <a type="button" class="btn btn-default" href="<?= base_url() ?>/reservas/listReservas">Volver</a>
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