<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('ventas_model');
       
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('ventas/view_ventas');
        $this->load->view('footer');
    }

    public function orden_venta() {
        $data['var'] = $this->ventas_model->mostrar_producto();

        $this->load->view('headers/librerias');
        $this->load->view('ventas/orden_venta', $data);
        $this->load->view('footer');
    }
    
    public function guardar_orden_venta()
    {
        //$bandera = '';
        echo $materiales = $this->input->post('producto');
        /*$cantidades = $this->input->post('cantidad');
        $numero = $this->input->post('numero');
        $costo = $this->input->post('costo');
        
        $var1 = $this->produccion_model->numero_orden_venta();

        foreach ($var1 as $fila) {
            if ($fila->numero_orden == $numero) {
                $bandera = true;
                break;
            } else {
                $bandera = false;
            }
        }
        if ($bandera == TRUE) {
            $data['var'] = 'Existe una Orden con ese numero';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');
        } else {
            $nombres = explode("|", $materiales);
            $cantidad = explode("|", $cantidades);
            $costos = explode("|", $costo);

            $var = count($nombres);

            for ($i = 0; $i < $var - 1; $i++) {
                $data1 = array(
                    'numero_orden' => $numero,
                    'nombre' => $nombres[$i],
                    'cantidad' => $cantidad[$i],
                    'costo' => $costos
                );
                $this->produccion_model->insertar_materiales_orden_venta($data1);                
            }
            $data = array(
                'numero_orden' => $this->input->post('numero'),
                'fecha' => $this->input->post('fecha')
            );
            $this->produccion_model->insertar_orden_venta($data);
            redirect('produccion/ver_orden_pedido');
        }*/
    }

    public function aprobar_orden_venta() {
        $this->load->view('headers/librerias');
        $this->load->view('ventas/aprobar_orden_venta');
        $this->load->view('footer');
    }

    public function factura() {
        $data['var'] = $this->ventas_model->mostrar_producto();

        $this->load->view('headers/librerias');
        $this->load->view('ventas/generar_factura', $data);
        $this->load->view('footer');
    }
    
    


    

    public function anular_factura() {
        $this->load->view('headers/librerias');
        $this->load->view('ventas/anular_factura');
        $this->load->view('footer');
    }

}
