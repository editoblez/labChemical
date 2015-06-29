<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class administracion extends CI_Controller {

    function __construct() {
        parent::__construct();
       /* if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }*/
        $this->load->model('administracion_model');
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('administracion/view_administracion');
        $this->load->view('footer');
    }

    public function username_check($str) {
        if (!preg_match("/^[a-z][A-Za-z0-9]*$/", $str)) {
            $this->form_validation->set_message('username_check', 'El %s campo usuario es incorrecto');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insertar_usuario() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s solo permite numeros y letras');

        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|callback_username_check');
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required|alpha_numeric|md5');
        $this->form_validation->set_rules('rol', 'Rol', 'required');

        if ($this->form_validation->run() == false) {
            $rol = $this->input->post('rol');
            if ($rol != false) {
                $data['var1'] = $rol;
            } else {
                $data['var1'] = '';
            }

            $data['var'] = $this->administracion_model->mostrar_usuario();

            $this->load->view('headers/librerias');
            $this->load->view('administracion/usuarios', $data);
            $this->load->view('footer');
        } else {
            $nombre = $this->input->post('user');

            $usuarios = $this->administracion_model->mostrar_usuario();

            foreach ($usuarios as $usuario) {

                if ($usuario->nombre_usuario == $nombre) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe ese usuario ';
                $data['direccion'] = 'administracion/mostrar_usuario';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nombre_usuario' => $this->input->post('user'),
                    'clave' => $this->input->post('contraseña'),
                    'rol' => $this->input->post('rol'));

                $this->administracion_model->insertar_usuario($data);
                redirect('administracion/mostrar_usuario');
            }
        }
    }

    public function mostrar_usuario() {
        $data['var'] = $this->administracion_model->mostrar_usuario();

        $this->load->view('headers/librerias');
        $this->load->view('administracion/usuarios', $data);
        $this->load->view('footer');
    }

    public function eliminar_usuario() {
        $id = $this->uri->segment(3);
        $this->administracion_model->eliminar_usuario($id);
        redirect('administracion/mostrar_usuario');
    }

    public function editar_usuario() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administracion_model->usuario_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_usuario', $data);
        $this->load->view('footer');
    }

    public function actualizar_usuario() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s solo permite numeros y letras');

        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|callback_username_check');
        
        $id = $this->input->post('id');

        if ($this->form_validation->run() == false) {

            $data['id'] = $id;

            $rol = $this->input->post('rol');

            if ($rol != false) {
                $data['rol'] = $rol;
            } else {
                $data['rol'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administracion/editar_usuario1', $data);
            $this->load->view('footer');
        } else {
            $nombre = $this->input->post('user');

            $usuarios = $this->administracion_model->mostrar_usuario();

            foreach ($usuarios as $usuario) {

                if ($usuario->nombre_usuario == $nombre && $id != $usuario->idusuario) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe ese usuario ';
                $data['direccion'] = 'administracion/mostrar_usuario';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nombre_usuario' => $this->input->post('user'),
                    'rol' => $this->input->post('rol'));

                $id = $this->input->post('id');

                $this->administracion_model->atualizar_usuario($id, $data);
                redirect('administracion/mostrar_usuario');
            }
        }
    }

    public function espacio_check($str) {
        if (!preg_match("/^[A-Z][A-Za-z\ ]*$/", $str)) {
            $this->form_validation->set_message('espacio_check', 'El campo %s es incorrecto');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insertar_mat_prima() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');
        $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'required');
        $bandera = false;

        if ($this->form_validation->run() == false) {
            $unidad_med = $this->input->post('unidad_medida');
            if ($unidad_med != false) {
                $data['var1'] = $unidad_med;
            } else {
                $data['var1'] = '';
            }

            $data['var'] = $this->administracion_model->mostrar_mat_prima();
            $this->load->view('headers/librerias');
            $this->load->view('administracion/materia_prima', $data);
            $this->load->view('footer');
        } else {
            $materia_prima = $this->input->post('nombre');

            $nombres = $this->administracion_model->mostrar_mat_prima();
            if ($nombres){
                foreach ($nombres as $nombre) {

                    if ($nombre->nombre_materia_prima == $materia_prima) {
                        $bandera = true;
                        break;
                    } else {
                        $bandera = false;
                    }
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe esa materia prima ';
                $data['direccion'] = 'administracion/mostrar_mat_prima';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nombre_materia_prima' => $this->input->post('nombre'),
                    'unidad_medida' => $this->input->post('unidad_medida'),);

                $this->administracion_model->insertar_mat_prima($data);
                $data1 = array(
                    'nombre_materia_prima' => $this->input->post('nombre'),
                    'cantidad' => 0
                );
                //$this->administracion_model->insertar_mat_prima_bodega($data1);
                //$this->administracion_model->insertar_materia_prima_bodega($data1);
                //$this->administracion_model->insertar_materia_prima_laboratorio($data1);
                
                
                redirect('administracion/mostrar_mat_prima');
            }
        }
    }

    public function mostrar_mat_prima() {
        $data['var'] = $this->administracion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('administracion/materia_prima', $data);
        $this->load->view('footer');
    }

    public function eliminar_mat_prima() {
        $id = $this->uri->segment(3);
        $this->administracion_model->eliminar_mat_prima($id);
        redirect('administracion/mostrar_mat_prima');
    }

    public function editar_mat_prima() {
        $id = $this->uri->segment(3);
        
        $data['var'] = $this->administracion_model->mat_prima_id($id);

        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_mat_prima', $data);
        $this->load->view('footer');
    }

    public function actualizar_mat_prima() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');
        $id = $this->input->post('id');
        if ($this->form_validation->run() == false) {

            $data['id'] = $this->input->post('id');

            $um = $this->input->post('unidad_medida');

            if ($um != false) {
                $data['um'] = $um;
            } else {
                $data['um'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administracion/editar_mat_prima1', $data);
            $this->load->view('footer');
        } else {
            $materia_prima = $this->input->post('nombre');

            $nombres = $this->administracion_model->mostrar_mat_prima();

            foreach ($nombres as $nombre) {

                if ($nombre->nombre_materia_prima == $materia_prima && $id != $nombre->idmateria_prima) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe esa materia prima ';
                $data['direccion'] = 'administracion/mostrar_mat_prima';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $data = array(
                    'nombre_materia_prima' => $this->input->post('nombre'),
                    'unidad_medida' => $this->input->post('unidad_medida'));


                $id = $this->input->post('id');
                $this->administracion_model->atualizar_mat_prima($id, $data);
                redirect('administracion/mostrar_mat_prima');
            }
        }
    }

    public function insertar_producto() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');        

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');        

        if ($this->form_validation->run() == false) {
            $this->mostrar_producto();
        } else {
//            $ingredientes = $this->administracion_model->materiales_formula($this->input->post('formula'));
//            foreach ($ingredientes as $ingrediente) {
//                $costo = $this->administracion_model->costo_mat_prima($ingrediente->ingredientes);
//                $costoTotal += $costo->costo;
//            }
            
            $nombre_formula = $this->input->post('formula');
            $idformula = $this->administracion_model->get_id_formula($nombre_formula)->idformula;
            $data = array('nombre_producto' => $this->input->post('nombre'),
                'idformula' => $idformula,
                'costo' => 0,
                'unidad_medida' => $this->input->post('unidad_medida')                
                 );
            $this->administracion_model->insertar_producto($data);
            $data1 = array(
                'nombre' => $this->input->post('nombre')
            );
            $this->administracion_model->insertar_productos_terminados($data1);
            redirect('administracion/mostrar_producto');
        }
    }

    public function mostrar_producto() {
        $data['var'] = $this->administracion_model->mostrar_producto();
        $data['formula'] = $this->administracion_model->mostrar_formula();
        $this->load->view('headers/librerias');
        $this->load->view('administracion/productos', $data);
        $this->load->view('footer');
    }

    public function eliminar_producto() {
        $id = $this->uri->segment(3);
        $this->administracion_model->eliminar_producto($id);
        redirect('administracion/mostrar_producto');
    }

    public function editar_producto() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administracion_model->producto_id($id);
        $data['formula'] = $this->administracion_model->mostrar_formula();
        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_productos', $data);
        $this->load->view('footer');
    }

    public function actualizar_producto() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');        

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|callback_espacio_check');

        if ($this->form_validation->run() == false) {

            $data['id'] = $this->input->post('id');

            $um = $this->input->post('unidad_medida');

            if ($um != false) {
                $data['um'] = $um;
            } else {
                $data['um'] = '';
            }

            $this->load->view('headers/librerias');
            $this->load->view('administracion/editar_productos1', $data);
            $this->load->view('footer');
        } else {
            $ingredientes = $this->administracion_model->materiales_formula($this->input->post('formula'));
            foreach ($ingredientes as $ingrediente) {
                $costo = $this->administracion_model->costo_mat_prima($ingrediente->ingredientes);
                $costoTotal += $costo->costo * $ingrediente->cantidad;
            }
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'formula' => $this->input->post('formula'),
                'costo' => $costoTotal,
                'unidad_medida' => $this->input->post('unidad_medida'),
                'tiempo_vida' => $this->input->post('tiempo_vida'));

            $id = $this->input->post('id');

            $this->administracion_model->atualizar_producto($id, $data);
            redirect('administracion/mostrar_producto');
        }
    }

    public function formula() {
        $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();
        $data['var'] = $this->administracion_model->mostrar_formula();


        $this->load->view('headers/librerias');
        $this->load->view('administracion/formula', $data);
        $this->load->view('footer');
    }
    
    public function formula_check($str) {
        $bandera = TRUE;
        $nombre_formula = $this->input->post('nombre_formula');
        $var1 = $this->administracion_model->buscar_nombre();
            if ($var1){
                foreach ($var1 as $fila) {
                    if ($fila->nombre_formula == $nombre_formula) {
                        $bandera = FALSE;
                        break;
                    } 
                }
            }
        return $bandera;
    }

    public function insertar_formula() {
        $ingredientes = $this->input->post('mat_prima');
        $cantidades = $this->input->post('cantidad');
        $nombre_formula = $this->input->post('nombre_formula');
        $nombre_formula_messages = array('required' => 'El campo %s es requerido',
                                    'formula_check' => 'El campo %s no debe ser único');
        
        $ingredientes_messages = array('required' => 'El campo %s es requerido');

        $this->form_validation->set_rules('nombre_formula', 
                'Nombre de la Fórmula', 
                'trim|required|callback_formula_check', 
                $nombre_formula_messages);
        $this->form_validation->set_rules('cantidad', 
                'Cantidad', 
                'trim|required', 
                $ingredientes_messages);
        
        if ($this->form_validation->run() == FALSE){
            $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();
            $data['var'] = $this->administracion_model->mostrar_formula();
            $this->load->view('headers/librerias');
            $this->load->view('administracion/formula', $data);
            $this->load->view('footer');
        }
       else {
            $nombres = explode("|", $ingredientes);
            $cantidad = explode("|", $cantidades);

            $data = array(
                'nombre_formula' => $this->input->post('nombre_formula')
            );
            $this->administracion_model->insertar_formula($data);
            $id = $this->administracion_model->id_formula($this->input->post('nombre_formula'));
            $var = count($nombres);
            for ($i = 0; $i < $var - 1; $i++) {
                $materia_prima_id = $this->administracion_model->get_id_materia ($nombres[$i]);
                $data1 = array(
                    'idformula' => $id->idformula,
                    'idmateria_prima' => $materia_prima_id,
                    'cantidad' => $cantidad[$i]
                );
                $this->administracion_model->insertar_ingredientes_formula($data1);
            }
            redirect('administracion/formula');
        }
    }

    public function ver_materiales_formula() {
        $nombre = $this->uri->segment(3);
        $data['var'] = $this->administracion_model->materiales_formula($nombre);

        $this->load->view('headers/librerias');
        $this->load->view('administracion/materiales_formula', $data);
        $this->load->view('footer');
    }

    public function eliminar_formula() {
        $id = $this->uri->segment(3);
        $nom = $this->administracion_model->nombre_formula($id);
        $nombre = $nom->nombre;

        $this->administracion_model->eliminar_formula($nombre);
        redirect('administracion/formula');
    }

    public function editar_formula() {
        $id = $this->uri->segment(3);
        $formula = $this->administracion_model->nombre_formula($id);
        $data['materiales'] = $this->administracion_model->materiales_formula($formula->nombre);
        $data['formula'] = $formula->nombre;
        $data['id'] = $id;
        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_formula', $data);
        $this->load->view('footer');
    }

    public function editar_formula1($id) {
        $formula = $this->administracion_model->nombre_formula($id);
        $data['materiales'] = $this->administracion_model->materiales_formula($formula->nombre);
        $data['formula'] = $formula->nombre;
        $data['id'] = $id;
        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_formula', $data);
        $this->load->view('footer');
    }

    public function editar_nombre_formula() {
        $id = $this->uri->segment(3);
        $formula = $this->administracion_model->nombre_formula($id);

        $data['formula'] = $formula->nombre;
        $data['id'] = $id;
        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_nombre_formula', $data);
        $this->load->view('footer');
    }

    public function actualizar_nombre_formula() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('alpha', 'El campo %s solo permite letras');

        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|alpha');


        if ($this->form_validation->run() == false) {
            $data['id'] = $this->input->post('id');
            $data['formula'] = '';
            $this->load->view('headers/librerias');
            $this->load->view('administracion/editar_nombre_formula', $data);
            $this->load->view('footer');
        } else {
            $nombre = $this->input->post('nombre');
            $id = $this->input->post('id');
            $this->administracion_model->actualizar_nombre_formula($id, $nombre);
            $this->editar_formula1($id);
        }
    }

    public function eliminar_ingrediente_formula() {
        $id = $this->uri->segment(3);
        $idFormula = $this->administracion_model->buscar_id_formula($id);
        $this->administracion_model->eliminar_ingrediente_formula($id);
        $this->editar_formula1($idFormula->id_formula);
    }

    public function agregar_ingrediente_formula() {
        $data['id'] = $this->uri->segment(3);
        $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('administracion/agregar_ingrediente_formula', $data);
        $this->load->view('footer');
    }
    public function agregar_ingrediente_formula1($id) {
        $data['id'] = $id;
        $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('administracion/agregar_ingrediente_formula', $data);
        $this->load->view('footer');
    }

    public function insertar_ingrediente_formula() {

        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->agregar_ingrediente_formula1($id);
        } else {

            $id = $this->input->post('id');
            $nombre = $this->administracion_model->nombre_formula($id);
            $data = array(
                'id_formula' => $id,
                'nombre' => $nombre->nombre,
                'ingredientes' => $this->input->post('mat_prima'),
                'cantidad' => $this->input->post('cantidad')
            );
            $this->administracion_model->insertar_ingredientes_formula($data);
            $this->editar_formula1($id);
        }
    }

    public function editar_ingrediente_formula() {
        $id = $this->uri->segment(3);
        $data['var'] = $this->administracion_model->ingrediente($id);
        $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_ingrediente_formula', $data);
        $this->load->view('footer');
    }

    public function editar_ingrediente_formula1($id) {
        $data['var'] = $this->administracion_model->ingrediente($id);
        $data['mat_prima'] = $this->administracion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('administracion/editar_ingrediente_formula', $data);
        $this->load->view('footer');
    }

    public function actualizar_ingrediente_formula() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->editar_ingrediente_formula1($id);
        } else {
            $ingredientes = $this->input->post('matria_prima');
            $cantidad = $this->input->post('cantidad');
            $id = $this->input->post('id');

            $this->administracion_model->actualizar_ingrediente_formula($id, $ingredientes, $cantidad);
            $idFormula = $this->administracion_model->buscar_id_formula($id);
            $id1 = $idFormula->id_formula;
            $this->editar_formula1($id1);
        }
    }

}
