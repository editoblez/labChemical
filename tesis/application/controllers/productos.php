<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('productos_model');
    }

    public function index() {
        $data['var'] = $this->productos_model->mostrar_productos_terminados();
        
        $this->load->view('headers/librerias');
        $this->load->view('productos/mostrar_productos', $data);
        $this->load->view('footer');
    }
    
    public function mostrar_producto()
    {
        $datos = $this->productos_model->mostrar_productos_terminados();
        
        foreach ($datos as $fila) {
        $data['tiempo'] = $this->productos_model->tiempo_vida($fila->nombre);
        }
        $data['var'] = $this->productos_model->mostrar_productos_terminados();
        
        $this->load->view('headers/librerias');
        $this->load->view('productos/mostrar_productos', $data);
        $this->load->view('footer');
    }

}
