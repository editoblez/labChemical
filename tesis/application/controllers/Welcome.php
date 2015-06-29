<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   class Welcome extends CI_Controller {

        function __construct() {
            parent::__construct();
            if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
            $this->load->model('prueba_model');
            
        }
        public function index() {
            $this->load->view('headers/librerias');
            $this->load->view('principal');
            $this->load->view('footer');
        }

        public function prueba() {
             $data['numero'] = ''; 
             $x = $this->uri->segment(3);
             if($x !=false)
             {
              $aux = $this->prueba_model->mostrar();   
                $data['numero'] = 1 + $aux->numero;
                $this->prueba_model->actualizar($data);
             }
             else
             {
                 $data['numero'] = 1;
                 $this->prueba_model->actualizar($data);
             }

                $this->load->view('headers/librerias');
                $this->load->view('prueba', $data);
                $this->load->view('footer');

        }
    }

