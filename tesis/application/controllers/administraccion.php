<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administraccion extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('administraccion_model');
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('administraccion/view_administraccion');
        $this->load->view('footer');
    }

    public function insertar_usuario() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s solo permite numeros y letras');

        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required|alpha_numeric|md5');
        $this->form_validation->set_rules('rol', 'Rol', 'required');

        if ($this->form_validation->run() == false) {
            $rol = $this->input->post('rol');
            if ($rol != false) {
                $data['var1'] = $rol;
            } else {
                $data['var1'] = '';
            }

            $data['var'] = $this->administraccion_model->mostrar_usuario();

            $this->load->view('headers/librerias');
            $this->load->view('administraccion/usuarios', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'user' => $this->input->post('user'),
                'contraseña' => $this->input->post('contraseña'),
                'rol' => $this->input->post('rol'));

            $this->administraccion_model->insertar_usuario($data);
            redirect('administraccion/mostrar_usuario');
        }
    }

    public function mostrar_usuario() {
        $data['var'] = $this->administraccion_model->mostrar_usuario();

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/usuarios', $data);
        $this->load->view('footer');
    }

    public function eliminar_usuario() {
        $id = $this->uri->segment(3);
        $this->administraccion_model->eliminar_usuario($id);
        redirect('administraccion/mostrar_usuario');
    }

    public function editar_usuario() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administraccion_model->usuario_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/editar_usuario', $data);
        $this->load->view('footer');
    }

    public function actualizar_usuario() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s solo permite numeros y letras');

        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|alpha_numeric');

        if ($this->form_validation->run() == false) {

            $data['id'] = $this->input->post('id');

            $rol = $this->input->post('rol');

            if ($rol != false) {
                $data['rol'] = $rol;
            } else {
                $data['rol'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administraccion/editar_usuario1', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'user' => $this->input->post('user'),
                'rol' => $this->input->post('rol'));

            $id = $this->input->post('id');

            $this->administraccion_model->atualizar_usuario($id, $data);
            redirect('administraccion/mostrar_usuario');
        }
    }

    public function insertar_mat_prima() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha');
        $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'required');

        if ($this->form_validation->run() == false) {
            $unidad_med = $this->input->post('unidad_medida');
            if ($unidad_med != false) {
                $data['var1'] = $unidad_med;
            } else {
                $data['var1'] = '';
            }

            $data['var'] = $this->administraccion_model->mostrar_mat_prima();
            $this->load->view('headers/librerias');
            $this->load->view('administraccion/materia_prima', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'unidad_medida' => $this->input->post('unidad_medida'),);

            $this->administraccion_model->insertar_mat_prima($data);
            $data1 = array(
                'nombre' => $this->input->post('nombre'),
                'cantidad' => 0
            );
            $this->administraccion_model->insertar_mat_prima_bodega($data1);
            redirect('administraccion/mostrar_mat_prima');
        }
    }

    public function mostrar_mat_prima() {
        $data['var'] = $this->administraccion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/materia_prima', $data);
        $this->load->view('footer');
    }

    public function eliminar_mat_prima() {
        $id = $this->uri->segment(3);
        $this->administraccion_model->eliminar_mat_prima($id);
        redirect('administraccion/mostrar_mat_prima');
    }

    public function editar_mat_prima() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administraccion_model->mat_prima_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/editar_mat_prima', $data);
        $this->load->view('footer');
    }

    public function actualizar_mat_prima() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha');
        if ($this->form_validation->run() == false) {

            $data['id'] = $this->input->post('id');

            $um = $this->input->post('unidad_medida');

            if ($um != false) {
                $data['um'] = $um;
            } else {
                $data['um'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administraccion/editar_mat_prima1', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'unidad_medida' => $this->input->post('unidad_medida'));


            $id = $this->input->post('id');
            $this->administraccion_model->atualizar_mat_prima($id, $data);
            redirect('administraccion/mostrar_mat_prima');
        }
    }

    public function insertar_producto() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha');
        $this->form_validation->set_rules('costo', 'Costo', 'trim|required|numeric');
        $this->form_validation->set_rules('unidad_medida', 'UM', 'required');

        if ($this->form_validation->run() == false) {
            $um = $this->input->post('unidad_medida');
            if ($um != false) {
                $data['var1'] = $um;
            } else {
                $data['var1'] = '';
            }

            $data['var'] = $this->administraccion_model->mostrar_producto();

            $this->load->view('headers/librerias');
            $this->load->view('administraccion/productos', $data);
            $this->load->view('footer');
        } else {
            $data = array('nombre' => $this->input->post('nombre'),
                'costo' => $this->input->post('costo'),
                'unidad_medida' => $this->input->post('unidad_medida'));

            $this->administraccion_model->insertar_producto($data);
            redirect('administraccion/mostrar_producto');
        }
    }

    public function mostrar_producto() {
        $data['var'] = $this->administraccion_model->mostrar_producto();

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/productos', $data);
        $this->load->view('footer');
    }

    public function eliminar_producto() {
        $id = $this->uri->segment(3);
        $this->administraccion_model->eliminar_producto($id);
        redirect('administraccion/mostrar_producto');
    }

    public function editar_producto() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administraccion_model->producto_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/editar_productos', $data);
        $this->load->view('footer');
    }

    public function actualizar_producto() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros ');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha');
        $this->form_validation->set_rules('costo', 'Costo', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {

            $data['id'] = $this->input->post('id');

            $um = $this->input->post('unidad_medida');

            if ($um != false) {
                $data['um'] = $um;
            } else {
                $data['um'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administraccion/editar_productos1', $data);
            $this->load->view('footer');
        } else {
            $data = array('nombre' => $this->input->post('nombre'),
                'costo' => $this->input->post('costo'),
                'unidad_medida' => $this->input->post('unidad_medida'));

            $id = $this->input->post('id');

            $this->administraccion_model->atualizar_producto($id, $data);
            redirect('administraccion/mostrar_producto');
        }
    }

    public function formula() {
        $data['mat_prima'] = $this->administraccion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('administraccion/formula', $data);
        $this->load->view('footer');
    }

    public function insertar_formula() {

        echo $_POST['nombre'];
    }

}
