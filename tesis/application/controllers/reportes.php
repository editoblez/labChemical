<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('reportes_model');
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('reportes/view_reportes');
        $this->load->view('footer');
    }

    public function reporte_ordenes_produccion() {
        $data['var'] = '';

        $this->load->view('headers/librerias');
        $this->load->view('reportes/reporte_ordenes_produccion', $data);
        $this->load->view('footer');
    }

    public function mostrar_reportes_ordenes_produccion() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');

        $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required');
        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');

        if ($this->form_validation->run() == false) {
            $this->reporte_ordenes_produccion();
        } else {
            $fecha_inicio = $this->input->post('fecha_inicio');
            $fecha_fin = $this->input->post('fecha_fin');

            $data['var'] = $this->reportes_model->reporte_ordenes_produccion($fecha_inicio, $fecha_fin);

            $this->load->view('headers/librerias');
            $this->load->view('reportes/reporte_ordenes_produccion', $data);
            $this->load->view('footer');
        }
    }

    public function mostrar_materiales_orden_produccion() {
        $numero = $this->uri->segment(3);
        $data['var'] = $this->reportes_model->materiales_orden_produccion($numero);

        $this->load->view('headers/librerias');
        $this->load->view('reportes/materiales_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function reportes_consumo_mat_prima() {
        $data['var'] = '';
        $this->load->view('headers/librerias');
        $this->load->view('reportes/reportes_consumo_mat_prima', $data);
        $this->load->view('footer');
    }

    public function mostrar_consumo_mat_prima() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');

        $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required');
        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');

        if ($this->form_validation->run() == false) {
            $this->reportes_consumo_mat_prima();
        } else {
            $fecha_inicio = $this->input->post('fecha_inicio');
            $fecha_fin = $this->input->post('fecha_fin');
            $data['var'] = $this->reportes_model->reporte_consumo_materia_prima($fecha_inicio, $fecha_fin);

            $this->load->view('headers/librerias');
            $this->load->view('reportes/reportes_consumo_mat_prima', $data);
            $this->load->view('footer');
        }
    }

    public function reportes_productos_terminados() {
        $data['var'] = '';
        $this->load->view('headers/librerias');
        $this->load->view('reportes/reportes_productos_terminados', $data);
        $this->load->view('footer');
    }

    public function mostrar_productos_terminados() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');

        $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required');
        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');

        if ($this->form_validation->run() == false) {
            $this->reportes_productos_terminados();
        } else {
            $fecha_inicio = $this->input->post('fecha_inicio');
            $fecha_fin = $this->input->post('fecha_fin');

            $data['var'] = $this->reportes_model->reporte_productos_terminados($fecha_inicio, $fecha_fin);

            $this->load->view('headers/librerias');
            $this->load->view('reportes/reportes_productos_terminados', $data);
            $this->load->view('footer');
        }
    }

    public function reportes_ordenes_pedido() {
        $data['var'] = '';
        $this->load->view('headers/librerias');
        $this->load->view('reportes/reporte_ordenes_pedido', $data);
        $this->load->view('footer');
    }

    public function mostrar_reportes_ordenes_pedido() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');

        $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required');
        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required');

        if ($this->form_validation->run() == false) {
            $this->reportes_ordenes_pedido();
        } else {
            $fecha_inicio = $this->input->post('fecha_inicio');
            $fecha_fin = $this->input->post('fecha_fin');

            $data['var'] = $this->reportes_model->reporte_ordenes_pedido($fecha_inicio, $fecha_fin);

            $this->load->view('headers/librerias');
            $this->load->view('reportes/reporte_ordenes_pedido', $data);
            $this->load->view('footer');
        }
    }

    public function mostrar_materiales_orden_pedido() {
        $numero = $this->uri->segment(3);
        $data['var'] = $this->reportes_model->materiales_orden_pedido($numero);

        $this->load->view('headers/librerias');
        $this->load->view('reportes/materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function reportes_facturas() {
        $this->load->view('headers/librerias');
        $this->load->view('reportes/reporte_factura');
        $this->load->view('footer');
    }

}
