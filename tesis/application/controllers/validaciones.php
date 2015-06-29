<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validacion extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('validacion_model');
    }

    function existe_usuario($usuario) {
        $usuarios = $this->validacion_model->obtener_usuarios();

        foreach ($usuarios as $usuario_tmp) {
            if ($usuario_tmp->user == $usuario) {
                return true;
            }
        }
         return false ;
    }
}