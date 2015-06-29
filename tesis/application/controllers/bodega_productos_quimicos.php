<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega_productos_quimicos extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('bodega_productos_quimicos_model');
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/view_bodega_productos_quimicos');
        $this->load->view('footer');
    }

    public function float_check($str) {
        if (!preg_match("/^[0-9]+[\.][0-9]*$/", $str)) {
            $this->form_validation->set_message('float_check', 'Ejemplo del campo costo: 1.30');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function agregar_mat_prima() {

        $data['var'] = $this->bodega_productos_quimicos_model->mostrar_id_mat_prima();
        $data['mat_prima'] = $this->bodega_productos_quimicos_model->mat_prima();


        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/agregar_mat_prima', $data);
        $this->load->view('footer');
    }

    public function guadar_mat_prima() {
        $bandera = false;
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');
        $this->form_validation->set_rules('costo', 'Costo', 'trim|required|callback_float_check');
        $this->form_validation->set_rules('id_solicitud', 'Id de Solicitud', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {

            $data['mat_prima'] = $this->bodega_productos_quimicos_model->mat_prima();
            $data['var'] = $this->bodega_productos_quimicos_model->mostrar_id_mat_prima();
            $this->load->view('headers/librerias');
            $this->load->view('bodega_productos_quimicos/agregar_mat_prima', $data);
            $this->load->view('footer');
        } else {
            $nombre = $this->input->post('mat_prima');
            $id = $this->input->post('id_solicitud');
            $materias_prima = $this->bodega_productos_quimicos_model->mostrar_mat_prima();
            if ($materias_prima){
                foreach ($materias_prima as $mat_prima) {                
                    if (($mat_prima->nom_mat_prima == $nombre)&&($mat_prima->numero_solicitud == $id)) {
                        $bandera = true;
                        break;
                    } else {
                        $bandera = false;
                    }
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe una materia prima con ese Id de solicitud ';
                $data['direccion'] = 'bodega_productos_quimicos/agregar_mat_prima';
                $this->load->view('headers/librerias');
                $this->load->view('bodega_productos_quimicos/mensaje', $data);
                $this->load->view('footer');
            }
            else
            {
            $data = array(
                'nom_mat_prima' => $this->input->post('mat_prima'),
                'cantidad' => $this->input->post('cantidad'),
                'costo' => $this->input->post('costo'),
                'numero_solicitud' => $this->input->post('id_solicitud'));
            
            $this->bodega_productos_quimicos_model->insertar_mat_prima($data);
            
            $this->bodega_productos_quimicos_model->actualizar_materia_prima_bodega($data);
            
            $this->bodega_productos_quimicos_model->editar_costo($this->input->post('mat_prima'), $this->input->post('costo'));
            redirect('bodega_productos_quimicos/agregar_mat_prima');            
            }
        }
    }

    public function ver_mat_prima() {

        $data['var'] = $this->bodega_productos_quimicos_model->mostrar_mat_prima();
        $data['var1'] = '';
        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/mostrar_mat_prima', $data);
        $this->load->view('footer');
    }

    public function eliminar_mat_prima() {

        $id = $this->uri->segment(3);
        $this->bodega_productos_quimicos_model->eliminar_mat_prima($id);
        redirect('bodega_productos_quimicos/agregar_mat_prima');
    }

    public function editar_mat_prima() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->bodega_productos_quimicos_model->mat_prrima_id($id);
        $data['mat_prima'] = $this->bodega_productos_quimicos_model->mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/editar_mat_prima', $data);
        $this->load->view('footer');
    }

    public function actualizar_mat_prima() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');
        $this->form_validation->set_rules('costo', 'Costo', 'trim|required|callback_float_check');
        $this->form_validation->set_rules('numero_solicitud', 'Numero de Solicitud', 'required|numeric|trim');

        if ($this->form_validation->run() == false) {

            $data['mat_prima'] = $this->bodega_productos_quimicos_model->mat_prima();
            $data['nombre'] = $this->input->post('mat_prima');
            $data['unidad_medida'] = $this->input->post('unidad_medida');

            $this->load->view('headers/librerias');
            $this->load->view('bodega_productos_quimicos/editar_mat_prima1', $data);
            $this->load->view('footer');
        } else {
            $nombre = $this->input->post('mat_prima');
            $no_solicitud = $this->input->post('numero_solicitud');
            $id = $this->input->post('id');
            $materias_prima = $this->bodega_productos_quimicos_model->mostrar_mat_prima();
             
            foreach ($materias_prima as $mat_prima) {                
                if (($mat_prima->nom_mat_prima == $nombre)&&($mat_prima->numero_solicitud == $no_solicitud)&&($mat_prima->id_mat_prima != $id )) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe una materia prima con ese Id de solicitud ';
                $data['direccion'] = 'bodega_productos_quimicos/agregar_mat_prima';
                $this->load->view('headers/librerias');
                $this->load->view('bodega_productos_quimicos/mensaje', $data);
                $this->load->view('footer');
            }
            else
            {
            $data = array(
                'nom_mat_prima' => $this->input->post('mat_prima'),
                'cantidad' => $this->input->post('cantidad'),
                'costo' => $this->input->post('costo'),
                'numero_solicitud' => $this->input->post('numero_solicitud'));

            $id = $this->input->post('id');
            $this->bodega_productos_quimicos_model->actualizar_mat_prima($id, $data);
            $this->bodega_productos_quimicos_model->editar_costo($this->input->post('mat_prima'), $this->input->post('costo'));
            redirect('bodega_productos_quimicos/agregar_mat_prima');
            }
        }
    }

    public function buscar_mat_prima() {

        $this->form_validation->set_message('required', 'El campo %s no puede estar vacio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('buscar', 'Nombre', 'trim|required|alpha');

        if ($this->form_validation->run() == false) {
            $data['var1'] = '';
            $data['var'] = $this->bodega_productos_quimicos_model->mostrar_mat_prima();
            $this->load->view('headers/librerias');
            $this->load->view('bodega_productos_quimicos/mostrar_mat_prima', $data);
            $this->load->view('footer');
        } else {
            $this->buscar();
        }
    }

    public function buscar() {
        $data['var1'] = '';

        $nom = $this->input->post('buscar', true);

        if ($nom) {
            $result = $this->bodega_productos_quimicos_model->buscar_mat_prima(trim($nom));
            if ($result != false) {
                $data['var1'] = $result;
            } else {
                $data['var1'] = '';
            }
        }
        $data['var'] = '';
        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/mostrar_mat_prima', $data);
        $this->load->view('footer');
    }
    
    public function ver_datos_pedido ($numero_solicitud)
    {
        $data['var'] = '';
        if ($numero_solicitud)
        {
            $result = $this->bodega_productos_quimicos_model->pedido_numero_solicitud ($numero_solicitud);
            if ($result != false) {
                $data['var'] = $result;
            } else {
                $data['var'] = '';
            }
        }
        $this->load->view('headers/librerias');
        $this->load->view('bodega_productos_quimicos/mostrar_pedido', $data);
        $this->load->view('footer');
    }
    
    public function  eliminar_pedido     (){
         $id = $this->uri->segment(3);
        $this->bodega_productos_quimicos_model->eliminar_solicitud_by_ID($id);
        redirect('bodega_productos_quimicos/agregar_mat_prima');
    }
    
}
