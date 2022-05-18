<?php

namespace App\Controllers;

use stdClass;
use App\Models\SalasModel;
use App\Models\ReservaModel;
use CodeIgniter\I18n\Time;
use DateTime;

class Reservas extends MYController {

    public function __construct() {
        $this->ReservaModel = new ReservaModel();
        $this->SalasModel = new SalasModel();
        $this->dbs = \Config\Database::connect();
    }

    public function listReservas() {

        $data['lista_reservas'] = $this->ReservaModel->getList();

        $this->loadViews("reservas/reservas_index", $data);
    }

    public function crearReservas() {

        $this->dbs->transBegin();
        $data = array();
        $transOk = TRUE;
        $errors = '';
        $data['selectSalas'] = $this->SalasModel->where("estado_sala", 1)->findAll();

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "salas" => "Required",
                "persona_reserva" => "Required",
                "fechadesdedatetime" => "Required",
                "fechahastadatetime" => "Required",
            ),
            array(
                "salas" => array(
                    "Required" => "Debe seleccionar una sala"
                ),
                "persona_reserva" => array(
                    "Required" => "La reserva de una persona es requerida, por favor revisela"
                ),
                "fechadesdedatetime" => array(
                    "Required" => "La fecha desde es requerida, por favor revisela"
                ),
                "fechahastadatetime" => array(
                    "Required" => "La fecha hasta es requerida, por favor revisela"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = flashData($validation->getErrors());
                $data['error'] = true;
                $transOk = false;
            } else {
                $fechaInicio = $this->get_datetime_sql($_POST['fechadesdedatetime']);
                $fechaHasta = $this->get_datetime_sql($_POST['fechahastadatetime']);
                $array_reservas = array(
                    "sala_id" => $_POST['salas'],
                    "persona_reserva" => $_POST['persona_reserva'],
                    "observacion" => $_POST['observaciones'],
                    "fecha_inicio" => date($fechaInicio),
                    "fecha_hasta" => date($fechaHasta),
                    "estado" => '1',
                    "fecha_creacion" => date('Y-m-d H:i:s'),
                );
                $transOk = $this->ReservaModel->insert($array_reservas);
            }
            if ($this->dbs->transStatus() && $transOk) {
                $this->dbs->transCommit();
                return redirect()->to(base_url() . '/reservas/listReservas')->with('message', 'Sala creada correctamente');
            } else {
                $this->dbs->transRollback();
                return redirect()->to(base_url() . '/reservas/crearReservas')->with('error', $errors);
            }
        }

        $this->loadViews("reservas/reservas_crear", $data);
    }

    public function editarReservas($reservaId) {
        $this->dbs->transBegin();

        $datosReserva = $this->ReservaModel->where("id", $reservaId)->findAll();
        $data['selectSalas'] = $this->SalasModel->where("estado_sala", 1)->findAll();
        $data['lista_reserva'] = $datosReserva[0];
        $transOk = TRUE;
        $errors = '';

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "salas" => "Required",
                "persona_reserva" => "Required",
                "fechadesdedatetime" => "Required",
                "fechahastadatetime" => "Required",
            ),
            array(
                "salas" => array(
                    "Required" => "Debe seleccionar una sala"
                ),
                "persona_reserva" => array(
                    "Required" => "La reserva de una persona es requerida, por favor revisela"
                ),
                "fechadesdedatetime" => array(
                    "Required" => "La fecha desde es requerida, por favor revisela"
                ),
                "fechahastadatetime" => array(
                    "Required" => "La fecha hasta es requerida, por favor revisela"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = flashData($validation->getErrors());
                $data['error'] = true;
                $transOk &= false;
            } else {
                $fechaInicio = $this->get_datetime_sql($_POST['fechadesdedatetime']);
                $fechaHasta = $this->get_datetime_sql($_POST['fechahastadatetime']);
                $array_reservas = array(
                    "sala_id" => $_POST['salas'],
                    "persona_reserva" => $_POST['persona_reserva'],
                    "observacion" => $_POST['observacion'],
                    "fecha_inicio" => date($fechaInicio),
                    "fecha_hasta" => date($fechaHasta),
                    "fecha_actualizacion" => date('Y-m-d H:i:s'),
                );
                $transOk &= $this->ReservaModel->update($reservaId, $array_reservas);
            }

            if ($this->dbs->transStatus() && $transOk) {
                $this->dbs->transCommit();
                return redirect()->to(base_url() . '/reservas/listReservas')->with('message', 'Sala creada correctamente');
            } else {
                $this->dbs->transRollback();
                return redirect()->to(base_url() . '/reservas/editarReservas/' . $reservaId)->with('error', $errors);
            }
        }

        $this->loadViews("reservas/reservas_editar", $data);
    }

    public function eliminarReservas($reservaId) {

        $this->dbs->transBegin();

        $datosReserva = $this->ReservaModel->where("id", $reservaId)->findAll();
        $data['selectSalas'] = $this->SalasModel->where("estado_sala", 1)->findAll();
        $data['lista_reserva'] = $datosReserva[0];
        $transOk = TRUE;
        $errors = '';

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "salas" => "Required",
                "persona_reserva" => "Required",
                "fechadesdedatetime" => "Required",
                "fechahastadatetime" => "Required",
            ),
            array(
                "salas" => array(
                    "Required" => "Debe seleccionar una sala"
                ),
                "persona_reserva" => array(
                    "Required" => "La reserva de una persona es requerida, por favor revisela"
                ),
                "fechadesdedatetime" => array(
                    "Required" => "La fecha desde es requerida, por favor revisela"
                ),
                "fechahastadatetime" => array(
                    "Required" => "La fecha hasta es requerida, por favor revisela"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = flashData($validation->getErrors());
                $data['error'] = true;
                $transOk &= false;
            } else {
                $transOk &= $this->ReservaModel->delete($reservaId);
            }
            if ($this->dbs->transStatus() && $transOk) {
                $this->dbs->transCommit();
                return redirect()->to(base_url() . '/reservas/listReservas')->with('message', 'Sala creada correctamente');
            } else {
                $this->dbs->transRollback();
                return redirect()->to(base_url() . '/reservas/eliminarReservas/' . $reservaId)->with('error', $errors);
            }           
        }

        $data['textBtn'] = "Eliminar";
        $this->loadViews("reservas/reservas_editar", $data);
    }

    public function loadViews($view = null, $data = null) {
        if ($data) {
            $data['view'] = $view;
            echo view("includes/header", $data);
            echo view($view, $data);
            echo view("includes/footer", $data);
        } else {
            echo view("includes/header");
            echo view($view);
            echo view("includes/footer");
        }
    }

    public function viewModel($view = null, $data = null) {
        $data['view'] = $view;
        echo view($view, $data);
    }
}
