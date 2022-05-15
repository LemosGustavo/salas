<?php

namespace App\Controllers;

class SalasController extends BaseController
{
    public function index()
    {
        $this->loadViews("salas/index");
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
}
