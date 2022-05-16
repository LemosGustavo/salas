<?php

namespace App\Controllers;

use stdClass;
use App\Models\SalasModel;
use App\Models\ReservaModel;
use DateTime;

class Salas extends MYController {
    public function index() {
        $salasModel = new SalasModel();
        $reservaModel = new ReservaModel();
        
        $data['contadorSalas'] = $salasModel->where("id")->countAll();
        $data['contadorReservas'] = $reservaModel->where("id")->countAll();
lm($data);

        $this->loadViews("salas/index",$data);
    }

    public function listSalas() {
        $salasModel = new SalasModel();
        $data['lista_salas']= $salasModel->findAll();


        $this->loadViews("salas/salas_index",$data);
    }

    public function crearSalas() {
        $dbs = \Config\Database::connect();
        $dbs->transBegin();
        $salasModel = new SalasModel();

        helper(array("url", "form"));
        $validation = \Config\Services::validation();
        $transOk = TRUE;
        $data= array();

        $validation->setRules(
            array(
                "nombre" => "Required",
                "ubicacion" => "Required",
                "descripcion" => "Required|min_length[10]",
                "estado" => "Required",
            ),
            array(
                "nombre" => array(
                    "Required" => "El nombre es requerido, por favor reviselo"
                ),
                "ubicacion" => array(
                    "Required" => "La ubicacion es requerida, por favor revisela"
                ),
                "descripcion" => array(
                    "Required" => "La descripcion es requerida, por favor revisela",
                    "min_length" => "Minimo 10 caracteres"
                ),
                "estado" => array(
                    "Required" => "El estado es requerido, por favor reviselo"
                ),
            )
        );

        if ($_POST) {
            lm($_POST);
            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $data['error'] = true;
                lm($errors);
                $transOk = false;
            } else {
                $array_salas = array(
                    "nombre_sala" => $_POST['nombre'],
                    "ubicacion" => $_POST['ubicacion'],
                    "descripcion" => $_POST['descripcion'],
                    "estado_sala" => $_POST['estado'],
                    "fecha_creacion" => date('Y-m-d H:i:s'),
                );
                $transOk = $salasModel->insert($array_salas);
            }
            if ($dbs->transStatus() && $transOk) {
                $dbs->transCommit();
                return redirect()->to(base_url().'/salas/listSalas');
            } else {
                $dbs->transRollback();
                return redirect()->to(base_url().'/salas/crearSalas');
            }
        }

        $this->loadViews("salas/salas_crear",$data);
    }

    public function editarSalas($salaId) {
        
        $dbs = \Config\Database::connect();
        $dbs->transBegin();
        $salasModel = new SalasModel();
        $datosSala = $salasModel->where("id",$salaId)->findAll();
        $data['lista_sala'] = $datosSala[0];
        $transOk = TRUE;

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "nombre" => "Required",
                "ubicacion" => "Required",
                "descripcion" => "Required|min_length[10]",
                "estado" => "Required",
            ),
            array(
                "nombre" => array(
                    "Required" => "El nombre es requerido, por favor reviselo"
                ),
                "ubicacion" => array(
                    "Required" => "La ubicacion es requerida, por favor revisela"
                ),
                "descripcion" => array(
                    "Required" => "La descripcion es requerida, por favor revisela",
                    "min_length" => "Minimo 10 caracteres"
                ),
                "estado" => array(
                    "Required" => "El estado es requerido, por favor reviselo"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $data['error'] = true;
                lm($errors);
                $transOk &= false;
            } else {
                $array_salas = array(
                    "nombre_sala" => $_POST['nombre'],
                    "ubicacion" => $_POST['ubicacion'],
                    "descripcion" => $_POST['descripcion'],
                    "estado_sala" => $_POST['estado'],
                    "fecha_actualizacion" => date('Y-m-d H:i:s'),
                );
                $transOk &= $salasModel->update($salaId,$array_salas);
            }
            if ($dbs->transStatus() && $transOk) {
                $dbs->transCommit();
                return redirect()->to(base_url().'/salas/listsalas');
            } else {
                $dbs->transRollback();
                return redirect()->to(base_url().'/salas/editarSalas');
            }
        }
        
        $this->loadViews("salas/salas_editar",$data);
    }
    
    public function eliminarSalas($salaId) {
        
        $dbs = \Config\Database::connect();
        $dbs->transBegin();
        $salasModel = new SalasModel();
        $datosSala = $salasModel->where("id",$salaId)->findAll();
        $data['lista_sala'] = $datosSala[0];
        $transOk = TRUE;

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "nombre" => "Required",
                "ubicacion" => "Required",
                "descripcion" => "Required|min_length[10]",
                "estado" => "Required",
            ),
            array(
                "nombre" => array(
                    "Required" => "El nombre es requerido, por favor reviselo"
                ),
                "ubicacion" => array(
                    "Required" => "La ubicacion es requerida, por favor revisela"
                ),
                "descripcion" => array(
                    "Required" => "La descripcion es requerida, por favor revisela",
                    "min_length" => "Minimo 10 caracteres"
                ),
                "estado" => array(
                    "Required" => "El estado es requerido, por favor reviselo"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $data['error'] = true;
                lm($errors);
                $transOk &= false;
            } else {
                $transOk &= $salasModel->delete($salaId);
            }
            if ($dbs->transStatus() && $transOk) {
                $dbs->transCommit();
                return redirect()->to(base_url().'/salas/listsalas');
            } else {
                $dbs->transRollback();
                return redirect()->to(base_url().'/salas/editarSalas');
            }
        }
        $data['textBtn']="Eliminar";
        $this->loadViews("salas/salas_editar",$data);
    }

    public function crearSalasModal() {


        $salasModel = new SalasModel();

        helper(array("url", "form"));
        $validation = \Config\Services::validation();

        $validation->setRules(
            array(
                "nombre" => "Required",
                "ubicacion" => "Required",
                "descripcion" => "Required|min_length[10]",
                "estado" => "Required",
            ),
            array(
                "nombre" => array(
                    "Required" => "El nombre es requerido, por favor reviselo"
                ),
                "ubicacion" => array(
                    "Required" => "La ubicacion es requerida, por favor revisela"
                ),
                "descripcion" => array(
                    "Required" => "La descripcion es requerida, por favor revisela",
                    "min_length" => "Minimo 10 caracteres"
                ),
                "estado" => array(
                    "Required" => "El estado es requerido, por favor reviselo"
                ),
            )
        );

        if ($_POST) {
            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $data['error'] = $errors;
            } else {
                $array_salas = array(
                    "nombre_sala" => $_POST['nombre'],
                    "ubicacion" => $_POST['ubicacion'],
                    "descripcion" => $_POST['descripcion'],
                    "estado_sala" => $_POST['estado'],
                    "fecha_creacion" => date('Y-m-d H:i:s'),
                );
                $salasModel->insert($array_salas);
            }
        }

        $this->viewModel("salas/salas_crear_modal");
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
