<?php

namespace App\Models;

use CodeIgniter\Model;

class SalasModel extends Model {
    protected $table = "sala";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = false;
    protected $allowedFields = array("nombre_sala", "ubicacion", "descripcion", "estado_sala", "fecha_creacion", "fecha_actualizacion");
}
