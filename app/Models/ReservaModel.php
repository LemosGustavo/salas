<?php

namespace App\Models;
use CodeIgniter\Model;

class ReservaModel extends Model{
    protected $table = "sala";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted';

    protected $allowedFields = array("sala_id","persona_reservar","marcacion_calendario","fecha_inicio","fecha_hasta","estado","fecha_creacion","fecha_actualizacion");
    
}
