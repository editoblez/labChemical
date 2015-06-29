<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('clientes_model');
    }

    public function index() {
        
        $data['var'] = $this->clientes_model->mostrar_clientes();
        
        $this->load->view('headers/librerias');
        $this->load->view('clientes/mostrar_clientes', $data);
        $this->load->view('footer');
    }
    
    public function espacio_check($str) {
        if (!preg_match("/^[A-Z][A-Za-z\ ]*$/", $str)) {
            $this->form_validation->set_message('espacio_check', 'El campo %s es incorrecto');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function agregar_clientes() {
        $this->load->view('headers/librerias');
        $this->load->view('clientes/agregar_clientes');
        $this->load->view('footer');
    }

    public function guardar_clientes() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');
        $this->form_validation->set_rules('ruc', 'R.U.C', 'trim|required|numeric');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|trim');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('headers/librerias');
            $this->load->view('clientes/agregar_clientes');
            $this->load->view('footer');
        } else {
            $ruc = $this->input->post('ruc');

            $clientes = $this->clientes_model->mostrar_clientes();

            foreach ($clientes as $cliente) {
                
                if ($cliente->ruc == $ruc) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe un cliente con ese R.U.C ';
                $data['direccion'] = 'clientes/agregar_clientes';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            }
            else
            {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'ruc' => $this->input->post('ruc'),
                'telefono' => $this->input->post('telefono'),
                'direccion' => $this->input->post('direccion'));

            $this->clientes_model->insertar_clientes($data);
            redirect('clientes/mostrar_clientes');
            }
        }
    }

    public function mostrar_clientes() {

        $data['var'] = $this->clientes_model->mostrar_clientes();

        $this->load->view('headers/librerias');
        $this->load->view('clientes/mostrar_clientes', $data);
        $this->load->view('footer');
    }

    public function eliminar_clientes() {
        $id = $this->uri->segment(3);
        $this->clientes_model->eliminar_clientes($id);
        redirect('clientes/mostrar_clientes');
    }

    public function editar_clientes() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->clientes_model->clientes_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('clientes/editar_clientes', $data);
        $this->load->view('footer');
    }

    public function actualizar_clientes() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');
        $this->form_validation->set_rules('ruc', 'R.U.C', 'trim|required|numeric');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric|trim');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('headers/librerias');
            $this->load->view('clientes/editar_clientes1');
            $this->load->view('footer');
        } else {
            $ruc = $this->input->post('ruc');
            $id = $this->input->post('id');
            $clientes = $this->clientes_model->mostrar_clientes();

            foreach ($clientes as $cliente) {
                
                if (($cliente->ruc == $ruc)&&($cliente->id_clientes != $id )) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe un cliente con ese R.U.C ';
                $data['direccion'] = 'clientes/mostrar_clientes';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            }
            else
            {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'ruc' => $this->input->post('ruc'),
                'telefono' => $this->input->post('telefono'),
                'direccion' => $this->input->post('direccion'));

            $id = $this->input->post('id');

            $this->clientes_model->atualizar_clientes($id, $data);
            redirect('clientes/mostrar_clientes');
            }
        }
    }

    public function buscar_clientes() {

        $data['var'] = '';

        $nom = $this->input->post('buscar', true);

        if ($nom) {
            $result = $this->clientes_model->buscar_clientes(trim($nom));
            if ($result != false) {
                $data['var'] = $result;
            } else {
                $data['var'] = '';
            }
        }
        $this->load->view('headers/librerias');
        $this->load->view('clientes/buscar_clientes', $data);
        $this->load->view('footer');
    }

}
