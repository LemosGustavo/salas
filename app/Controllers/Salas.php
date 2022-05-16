<?php

namespace App\Controllers;

use stdClass;
use App\Models\SalasModel;
use App\Models\ReservaModel;

class Salas extends MYController {
    public function index() {
        $this->loadViews("salas/index");
    }

    public function listSalas() {
        $this->loadViews("salas/salas_index");
    }
    
    public function crearSalasModal() {
        
        
        $crear_salas = new SalasModel();
        
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
            }else {
                
                
            }
        }
        

		$crear_salas->fields = array(
			'nombre' => array('label' => 'Nombre', 'type' => 'text', 'id_name' => 'nombre', 'maxlength' => '50'),
			'ubicacion' => array('label' => 'Ubicación', 'type' => 'text', 'id_name' => 'ubicacion'),
			'descripcion' => array('label' => 'Descripción', 'type' => 'text','id_name' => 'descripcion'),
			'estado' => array('label' => 'Estado', 'id_name' => 'estado', 'input_type' => 'combo', 'array' => array('0' => 'No', '1' => 'Si')),
		);

		$data['fields'] = ;
lm($data);

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
