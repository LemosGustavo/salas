<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model {
    protected $table = "reserva_sala";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = false;

    protected $allowedFields = array("sala_id", "persona_reserva", "observacion", "fecha_inicio", "fecha_hasta", "estado", "fecha_creacion", "fecha_actualizacion");

    public function getList() {
        return $this->db->query("SELECT reserva_sala.id as reserva_id, sala.id as sala_id, sala.nombre_sala AS nombre,reserva_sala.persona_reserva, reserva_sala.observacion AS observacion,reserva_sala.estado as estado,reserva_sala.fecha_inicio,reserva_sala.fecha_hasta,reserva_sala.fecha_creacion,reserva_sala.fecha_actualizacion FROM salas.reserva_sala JOIN sala ON sala.id = reserva_sala.sala_id")->getResult();
    }
    public function getOneId($reserva_id) {
        return $this->db->query("SELECT reserva_sala.id as reserva_id, sala.id as sala_id, sala.nombre_sala AS nombre,reserva_sala.persona_reserva, reserva_sala.observacion AS observacion,reserva_sala.estado as estado,reserva_sala.fecha_inicio,reserva_sala.fecha_hasta,reserva_sala.fecha_creacion,reserva_sala.fecha_actualizacion FROM salas.reserva_sala JOIN sala ON sala.id = reserva_sala.sala_id", array($reserva_id))->getRow();
    }
}
