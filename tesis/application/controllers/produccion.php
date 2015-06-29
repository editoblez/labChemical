<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
            {
                redirect(base_url().'login');
            }
        $this->load->model('prueba_model');
        $this->load->model('produccion_model');
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('produccion/view_produccion');
        $this->load->view('footer');
    }

    public function bodega_produccion() {
        $data['var'] = $this->produccion_model->bodega_produccion();

        $this->load->view('headers/librerias');
        $this->load->view('produccion/bodega_produccion', $data);
        $this->load->view('footer');
    }

    public function orden_pedido() {
        $data['mat_prima'] = $this->produccion_model->mostrar_mat_prima();

        $this->load->view('headers/librerias');
        $this->load->view('produccion/orden_pedido', $data);
        $this->load->view('footer');
    }

    public function ver_orden_pedido() {

        $data['var'] = $this->produccion_model->mostrar_orden_pedido();

        $this->load->view('headers/librerias');
        $this->load->view('produccion/ver_orden_pedido', $data);
        $this->load->view('footer');
    }
    /**
     * Guarda la orden de pedido que viene de la vista orden_pedido
     */
    public function guardar_orden_pedido() {
        $bandera = false;
        $ingredientes = $this->input->post('nombre');
        $cantidades = $this->input->post('cantidad');
        $numero = $this->input->post('numero');
        $fecha = $this->input->post('fecha');
           /* echo "info", "Numero: $numero";
        echo "info", "Cantidad: $cantidades";
        echo "info", "Fecha: $fecha";
        echo  ("Nomabre: $ingredientes");*/
        $this->form_validation->set_rules('numero', 'Numero Orden de Pedido', 'trim|required|numeric');
        //$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required|numeric');
        
        if ($this->form_validation->run() == false || 
                (!($ingredientes) || 
                $ingredientes == "" || 
                !($cantidades) || 
                $cantidades == "")) {
            $data['mensaje'] = 'Campos no Válido';
            $data['direccion'] = 'produccion/orden_pedido';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');   
        }
        else if (!preg_match("/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/", $fecha)) {
            $data['mensaje'] = 'Fecha No válida, el formato es: MM-DD-YYYY';
            $data['direccion'] = 'produccion/orden_pedido';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');   
        }
        else{
        
            $fecha_part = explode("-", $fecha);
            //die (print_r ($fecha_part));
            $fecha = $fecha_part[2]."-".$fecha_part[1]."-".$fecha_part[0];
            //die ("Fecha: $fecha");
            $numero_ordenes_pedido = $this->produccion_model->numero_orden_pedido();


            foreach ($numero_ordenes_pedido as $numero_orden) {
                if ($numero_orden->numero_orden == $numero) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera == TRUE) {
                $data['mensaje'] = 'Existe una Orden con ese numero';
                $data['direccion'] = 'produccion/orden_pedido';

                $this->load->view('headers/librerias');
                $this->load->view('produccion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $nombres = explode("|", $ingredientes);
                $cantidad = explode("|", $cantidades);

                $var = count($nombres);

                for ($i = 0; $i < $var - 1; $i++) {
                    $data1 = array(
                        'numero_orden' => $this->input->post('numero'),
                        'nombre' => $nombres[$i],
                        'cantidad' => $cantidad[$i]
                    );
                    $this->produccion_model->insertar_materiales_orden_pedido($data1);
                    $this->produccion_model->insertar_bodega_produccion($data1);
                }
                $data = array(
                    'numero_orden' => $this->input->post('numero'),
                    'fecha' => $fecha
                );
                $this->produccion_model->insertar_orden_pedido($data);
                redirect('produccion/ver_orden_pedido');
            }
        }
    }

    public function ver_materiales_orden_pedido() {
        $numero = $this->uri->segment(3);
        $data['var'] = $this->produccion_model->materiales_orden_pedido($numero);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function eliminar_orden_pedido() {
        $numero = $this->uri->segment(3);

        $this->produccion_model->eliminar_orden_pedido($numero);
        redirect('produccion/ver_orden_pedido');
    }

    public function editar_orden_pedido() {
        $id = $this->uri->segment(3);
        $data['datos_orden'] = $this->produccion_model->datos_orden_pedido($id);
        $numero = $this->produccion_model->numero_orden_pedido_id($id);
        $data['materiales_orden'] = $this->produccion_model->materiales_orden_pedido($numero->numero_orden);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function editar_orden_pedido1($id) {
        $data['datos_orden'] = $this->produccion_model->datos_orden_pedido($id);
        $numero = $this->produccion_model->numero_orden_pedido_id($id);
        $data['materiales_orden'] = $this->produccion_model->materiales_orden_pedido($numero->numero_orden);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function editar_datos_orden_pedido() {
        $id = $this->uri->segment(3);
        $data['datos_orden'] = $this->produccion_model->datos_orden_pedido($id);
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_datos_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function editar_datos_orden_pedido1($id) {
        $data['datos_orden'] = $this->produccion_model->datos_orden_pedido($id);
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_datos_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function actualizar_datos_orden_pedido() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('numero', 'No. de Orden', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->editar_datos_orden_pedido1($id);
        } else {
            $num = $this->input->post('numero');
            $id = $this->input->post('id');
            $numeros = $this->produccion_model->numero_orden_pedido();

            foreach ($numeros as $numero) {

                if (($numero->numero_orden == $num) && ($numero->id_orden_pedido != $id)) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['mensaje'] = 'Ya existe ese numero de orden ';
                $data['direccion'] = 'produccion/ver_orden_pedido';
                $this->load->view('headers/librerias');
                $this->load->view('administracion/mensaje', $data);
                $this->load->view('footer');
            } else {
                $numero_ordenes_pedido = $this->produccion_model->numero_orden_pedido();
                $numero = $this->input->post('numero');
                $id = $this->input->post('id');
                foreach ($numero_ordenes_pedido as $numero_orden) {
                    if (($numero_orden->numero_orden == $numero) && ($numero_orden->id_orden_pedido != $id)) {
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
                    $numero = $this->input->post('numero');
                    $fecha = $this->input->post('fecha');
                    $id = $this->input->post('id');

                    $this->produccion_model->editar_datos_orden_pedido($id, $numero, $fecha);
                    $this->editar_orden_pedido1($id);
                }
            }
        }
    }

    public function editar_materiales_orden_pedido() {
        $id = $this->uri->segment(3);
        $data['materiales'] = $this->produccion_model->materiales_orden_pedido_id($id);
        $data['mat_prima'] = $this->produccion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function editar_materiales_orden_pedido1($id) {
        $data['materiales'] = $this->produccion_model->materiales_orden_pedido_id($id);
        $data['mat_prima'] = $this->produccion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function actualizar_materiales_orden_pedido() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('cantidad', 'No. de Orden', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->editar_materiales_orden_pedido1($id);
        } else {
            $data = array(
                'nombre' => $this->input->post('materia_prima'),
                'cantidad' => $this->input->post('cantidad')
            );
            $id = $this->input->post('id');
            $this->produccion_model->editar_materiales_orden_pedido($id, $data);
            $numero_orden = $this->produccion_model->numero_orden_id($id);
            $id_orden = $this->produccion_model->id_orden_pedido($numero_orden->numero_orden);
            $this->editar_orden_pedido1($id_orden->id_orden_pedido);
        }
    }

    public function eliminar_materiales_orden_pedido() {
        $id = $this->uri->segment(3);
        $numero_orden = $this->produccion_model->numero_orden_id($id);
        $id_orden = $this->produccion_model->id_orden_pedido($numero_orden->numero_orden);
        $this->produccion_model->eliminar_materiales_orden_pedido($id);
        $this->editar_orden_pedido1($id_orden->id_orden_pedido);
    }

    public function agregar_materiales_orden_pedido() {
        $id = $this->uri->segment(3);
        $data['id'] = $id;
        $data['mat_prima'] = $this->produccion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/agregar_materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function agregar_materiales_orden_pedido1($id) {
        $data['id'] = $id;
        $data['mat_prima'] = $this->produccion_model->mostrar_mat_prima();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/agregar_materiales_orden_pedido', $data);
        $this->load->view('footer');
    }

    public function insertar_materiales_orden_pedido() {
        $this->form_validation->set_message('required', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('numeric', 'El campo %s solo permite numeros');

        $this->form_validation->set_rules('numero', 'No. de Orden', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->agregar_materiales_orden_pedido1($id);
        } else {              
                $id = $this->input->post('id');
                $numero = $this->produccion_model->numero_orden_pedido_id($id);
                $data = array(
                    'numero_orden' => $numero->numero_orden,
                    'nombre' => $this->input->post('mat_prima'),
                    'cantidad' => $this->input->post('cantidad')
                );
                $this->produccion_model->insertar_material_orden_pedido($data);
                $this->editar_orden_pedido1($id);
            }        
    }

    public function orden_produccion() {

        $data['productos'] = $this->produccion_model->mostrar_productos();

        $this->load->view('headers/librerias');
        $this->load->view('produccion/orden_produccion', $data);
        $this->load->view('footer');
    }

    public function ver_orden_produccion() {

        $data['var'] = $this->produccion_model->mostrar_orden_produccion();

        $this->load->view('headers/librerias');
        $this->load->view('produccion/ver_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function cambiar_estado_orden() {
        $numero = $this->uri->segment(3);
        $this->produccion_model->cambiar_estado($numero);
        $this->agregar_productos_terminados($numero);
        redirect('produccion/ver_orden_produccion');
    }

    public function guardar_orden_produccion() {

        $bandera = '';
        $productos = $this->input->post('producto');
        $cantidades = $this->input->post('cantidad');
        $formulas = $this->input->post('formula');
        $numero = $this->input->post('numero');
        $responsable = $this->input->post('responsable');
        $fecha = $this->input->post('fecha');
        echo $costos = $this->input->post('costo');
        
        
        if (!$cantidades || $cantidades == ""){
            $data['mensaje'] = 'Debe ingresar al menos un producto';
            $data['direccion'] = 'produccion/orden_produccion';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');   
        }
        
        else if (!preg_match("/^[A-Za-z][a-z]*$/", $responsable)){
            $data['mensaje'] = 'Debe ingresar el responsable, debe comenzar el campo con Mayúscala segido de letras minúsculas';
            $data['direccion'] = 'produccion/orden_produccion';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');  
        }
        else if (!preg_match("/^[0-9][0-9]*$/", $numero)){
            $data['mensaje'] = 'Debe ingresar un numero';
            $data['direccion'] = 'produccion/orden_produccion';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');  
        }
        
        else if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $fecha)){
            $data['mensaje'] = 'Debe ingresar la fecha correcta en el formato: YYYY-MM-DD';
            $data['direccion'] = 'produccion/orden_produccion';
            $this->load->view('headers/librerias');
            $this->load->view('produccion/mensaje', $data);
            $this->load->view('footer');  
        }
        else
        {
            $var1 = $this->produccion_model->numero_orden_produccion();

            foreach ($var1 as $fila) {
                if ($fila->numero_orden == $numero) {
                    $bandera = true;
                    break;
                } else {
                    $bandera = false;
                }
            }
            if ($bandera) {
                $data['var'] = 'Existe una Orden con ese numero';
                $this->load->view('headers/librerias');
                $this->load->view('produccion/mensaje1', $data);
                $this->load->view('footer');
            } else {
                $nombres = explode("|", $productos);
                $cantidad = explode("|", $cantidades);
                $formula = explode("|", $formulas);
                $costo = explode("|", $costos);
                $var = count($nombres);

                for ($i = 0; $i < $var - 1; $i++) {
                    $data1 = array(
                        'numero_orden' => $this->input->post('numero'),
                        'producto' => $nombres[$i],
                        'cantidad' => $cantidad[$i],
                        'costo' => $costo[$i],
                        'formula' => $formula[$i]
                    );
                    $this->produccion_model->insertar_materiales_orden_produccion($data1);
                }
                $data = array(
                    'numero_orden' => $this->input->post('numero'),
                    'fecha' => $this->input->post('fecha'),
                    'responsable' => $this->input->post('responsable'),
                    'estado' => $this->input->post('estado')
                );
                $this->produccion_model->insertar_orden_produccion($data);
                $this->rebajar_bodega_produccion($this->input->post('numero'));
                redirect('produccion/ver_orden_produccion');
            }
        }
    }

    public function ver_materiales_orden_produccion() {
        $numero = $this->uri->segment(3);
        $data['var'] = $this->produccion_model->materiales_orden_produccion($numero);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/materiales_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function agregar_productos_terminados($numero) {
        $datos_orden = $this->produccion_model->materiales_orden_produccion($numero);
        foreach ($datos_orden as $datos) {
            $data = array(
                'numero_orden' => $datos->numero_orden,
                'nombre' => $datos->producto,
                'cantidad' => $datos->cantidad,
                'fecha' => date("Y-m-d"),
                'costo' => $datos->costo
            );
            $this->produccion_model->insertar_productos_terminados($data);
        }
    }

    public function rebajar_bodega_produccion($numero) {
        $productos_orden = $this->produccion_model->materiales_orden_produccion($numero);
        $productos = $this->produccion_model->bodega_produccion();
        foreach ($productos_orden as $producto_orden) {
            $cantidadPro = $producto_orden->cantidad;
            $nombre = $this->produccion_model->buscar_formula($producto_orden->producto);
            $ingredientes = $this->produccion_model->buscar_ingredientes($nombre->formula);
            $this->rebajar_bodega_produccion1($ingredientes, $productos, $cantidadPro, $numero);
        }
    }

    public function rebajar_bodega_produccion1($ingredientes, $productos, $cantidadPro, $numero) {
        $cantidadMat = 0;
        foreach ($ingredientes as $ingrediente) {
            foreach ($productos as $producto) {
                if ($ingrediente->ingredientes == $producto->nombre) {
                    $cantidadMat = $ingrediente->cantidad * $cantidadPro;
                    $cantidadFin = $producto->cantidad - $cantidadMat;
                    $this->produccion_model->actualizar_bodega_produccion($producto->nombre, $cantidadFin);
                }

                $data = array(
                    'numero_orden' => $numero,
                    'nombre' => $producto->nombre,
                    'cantidad' => $cantidadMat,
                    'fecha' => date("Y-m-d")
                );
                $this->produccion_model->insertar_materia_prima_consumida($data);
            }
        }
    }

    public function eliminar_orden_produccion() {
        $numero = $this->uri->segment(3);

        $this->produccion_model->eliminar_orden_produccion($numero);
        redirect('produccion/ver_orden_produccion');
    }

    public function editar_orden_produccion() {
        $id = $this->uri->segment(3);
        $data['datos_orden'] = $this->produccion_model->datos_orden_produccion($id);
        $numero = $this->produccion_model->numero_orden_produccion_id($id);
        $data['materiales_orden'] = $this->produccion_model->materiales_orden_produccion($numero->numero_orden);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function editar_orden_produccion1($id) {
        $data['datos_orden'] = $this->produccion_model->datos_orden_produccion($id);
        $numero = $this->produccion_model->numero_orden_produccion_id($id);
        $data['materiales_orden'] = $this->produccion_model->materiales_orden_produccion($numero->numero_orden);

        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function editar_datos_orden_produccion() {
        $id = $this->uri->segment(3);
        $data['datos_orden'] = $this->produccion_model->datos_orden_produccion($id);
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_datos_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function actualizar_datos_orden_produccion() {
        $numero_ordenes_produccion = $this->produccion_model->numero_orden_produccion();
        $numero = $this->input->post('numero');
        $id = $this->input->post('id');
        foreach ($numero_ordenes_produccion as $orden) {
            if (($orden->numero_orden == $numero) && ($orden->id_orden_produccion != $id)) {
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
            $data = array(
                'numero_orden' => $this->input->post('numero'),
                'fecha' => $this->input->post('fecha'),
                'responsable' => $this->input->post('responsable')
            );
            $id = $this->input->post('id');
            $numero = $this->input->post('numero');
            $this->produccion_model->editar_datos_orden_produccion($id, $data, $numero);
            $this->editar_orden_produccion1($id);
        }
    }

    public function editar_materiales_orden_produccion() {
        $id = $this->uri->segment(3);
        $data['materiales'] = $this->produccion_model->materiales_orden_produccion_id($id);
        $data['productos'] = $this->produccion_model->mostrar_productos();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/editar_materiales_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function actualizar_materiales_orden_produccion() {
        $data = array(
            'producto' => $this->input->post('producto'),
            'cantidad' => $this->input->post('cantidad'),
            'costo' => $this->input->post('costo'),
            'formula' => $this->input->post('formula')
        );
        $id = $this->input->post('id');
        $this->produccion_model->editar_materiales_orden_produccion($id, $data);
        $numero_orden = $this->produccion_model->id_numero_orden_produccion($id);
        $id_orden = $this->produccion_model->id_orden_produccion($numero_orden->numero_orden);
        $this->editar_orden_produccion1($id_orden->id_orden_produccion);
    }

    public function eliminar_materiales_orden_produccion() {
        $id = $this->uri->segment(3);
        $numero_orden = $this->produccion_model->id_numero_orden_produccion($id);
        $id_orden = $this->produccion_model->id_orden_produccion($numero_orden->numero_orden);
        $this->produccion_model->eliminar_materiales_orden_produccion($id);
        $this->editar_orden_produccion1($id_orden->id_orden_produccion);
    }

    public function agregar_materiales_orden_produccion() {
        $id = $this->uri->segment(3);
        $data['id'] = $id;
        $data['productos'] = $this->produccion_model->mostrar_productos();
        $this->load->view('headers/librerias');
        $this->load->view('produccion/agregar_materiales_orden_produccion', $data);
        $this->load->view('footer');
    }

    public function insertar_materiales_orden_produccion() {
        $id = $this->input->post('id');
        $numero = $this->produccion_model->numero_orden_produccion_id($id);
        $data = array(
            'numero_orden' => $numero->numero_orden,
            'producto' => $this->input->post('producto'),
            'cantidad' => $this->input->post('cantidad'),
            'costo' => $this->input->post('costo'),
            'formula' => $this->input->post('formula')
        );
        $this->produccion_model->insertar_materiales_orden_produccion($data);
        $this->editar_orden_produccion1($id);
    }

}
