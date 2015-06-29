<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertar_orden_pedido($data) {
        $this->db->insert('orden_pedido', $data);
    }

    function insertar_materiales_orden_pedido($data) {
        $this->db->insert('materiales_orden_pedido', $data);
    }

    function mostrar_mat_prima() {
        $sql = $this->db->get('materia_prima_produ');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function mostrar_productos() {
        $sql = $this->db->get('producto');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function numero_orden_pedido() {
        $this->db->select('numero_orden');
        $this->db->select('id_orden_pedido');
        $sql = $this->db->get('orden_pedido');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function mostrar_orden_pedido() {
        $this->db->order_by("fecha", "desc");
        $sql = $this->db->get('orden_pedido');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_orden_pedido($numero) {
        $this->db->where('numero_orden', $numero);
        $this->db->delete('orden_pedido');
        $this->db->where('numero_orden', $numero);
        $this->db->delete('materiales_orden_pedido');
    }

    function editar_orden_pedido($id, $data) {
        $this->db->where('id_orden_pedido', $id);
        $this->db->update('orden_pedido', $data);
    }

    function materiales_orden_pedido($numero) {
        $this->db->where('numero_orden', $numero);
        $sql = $this->db->get('materiales_orden_pedido');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

////// Muestra los datos de una orden 
    function datos_orden_pedido($id) {
        $this->db->where('id_orden_pedido', $id);
        $datos = $this->db->get('orden_pedido');
        if ($datos->num_rows() > 0) {
            return $datos->result();
        } else {
            return false;
        }
    }

    //// Devuelve el numero de la orden del id que se le pasa por parametro 
    function numero_orden_pedido_id($id) {
        $this->db->select('numero_orden');
        $this->db->where('id_orden_pedido', $id);
        $numero = $this->db->get('orden_pedido');

        if ($numero->num_rows() > 0) {
            return $numero->row();
        } else {
            return false;
        }
    }

//////////// Edita los datos de una orden y recibe por parametros el id de la orden y los datos 
    function editar_datos_orden_pedido($id, $numero, $fecha) {
        $this->db->where('id_orden_pedido', $id);
        $this->db->set('fecha', $fecha);
        $this->db->set('numero_orden', $numero);
        $this->db->update('orden_pedido');
        $this->db->set('numero_orden', $numero);
        $this->db->update('materiales_orden_pedido');
    }

    function materiales_orden_pedido_id($id) {
        $this->db->where('id_materiales_orden_pedido', $id);
        $sql = $this->db->get('materiales_orden_pedido');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function numero_orden_id($id) {
        $this->db->select('numero_orden');
        $this->db->where('id_materiales_orden_pedido', $id);
        $numero = $this->db->get('materiales_orden_pedido');
        if ($numero->num_rows() > 0) {
            return $numero->row();
        } else {
            return false;
        }
    }

    function id_orden_pedido($numero) {
        $this->db->select('id_orden_pedido');
        $this->db->where('numero_orden', $numero);
        $id = $this->db->get('orden_pedido');
        if ($id->num_rows() > 0) {
            return $id->row();
        } else {
            return false;
        }
    }

    function editar_materiales_orden_pedido($id, $data) {
        $this->db->where('id_materiales_orden_pedido', $id);
        $this->db->update('materiales_orden_pedido', $data);
    }
//// Agrega una materia prima a la orden de pedido
    function eliminar_materiales_orden_pedido($id) {
        $this->db->where('id_materiales_orden_pedido', $id);
        $this->db->delete('materiales_orden_pedido');
    }
    
    function insertar_material_orden_pedido($data) {        
        $this->db->insert('materiales_orden_pedido', $data);
    }

    function insertar_material_orden_produccion($id, $data) {
        $this->db->where('id_materiales_orden_pedido', $id);
        $this->db->insert('materiales_orden_pedido', $data);
    }

    function insertar_materia_prima_consumida($data) {
        $this->db->insert('materia_prima_consumida', $data);
    }

    function insertar_bodega_produccion($data) {
        $this->db->insert('bodega_produccion', $data);
    }

    function bodega_produccion() {
        $sql = $this->db->get('bodega_produccion');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    

    function cambiar_estado($numero_orden) {
        $estado = 'finalizada';
        $this->db->where('numero_orden', $numero_orden);
        $this->db->set('estado', $estado);
        $this->db->update('orden_produccion');
    }

    function buscar_formula($nombre) {
        $this->db->select('formula');
        $this->db->where('nombre', $nombre);
        $formula = $this->db->get('producto');

        $nom_formula = $formula->row();
        return $nom_formula;
    }

    function buscar_ingredientes($formula) {
        $this->db->where('nombre', $formula);
        $datos = $this->db->get('ingredientes_formula');

        if ($datos->num_rows() > 0) {
            return $datos->result();
        } else {
            return false;
        }
    }

    function insertar_productos_terminados($data) {
        $this->db->insert('productos_terminados', $data);
    }

    function productos_terminados() {
        $productos_terminados = $this->db->get('productos_terminados');

        if ($productos_terminados->num_rows() > 0) {
            return $productos_terminados->result();
        } else {
            return false;
        }
    }

    function actualizar_producto($nombre, $cantidad) {
        $this->db->where('nombre', $nombre);
        $this->db->set('cantidad', $cantidad);
        $this->db->update('productos_terminados');
    }

    function actualizar_bodega_produccion($nombre, $cantidad) {
        $this->db->where('nombre', $nombre);
        $this->db->set('cantidad', $cantidad);
        $this->db->update('bodega_produccion');
    }

    ///// Busca el numero de orden dado el nombre del producto
    function numero_orden_nombre($nombre) {
        $this->db->select('numero_orden');
        $this->db->where('producto', $nombre);
        $numero_orden = $this->db->get('materiales_orden_produccion');

        if ($numero_orden->num_rows() > 0) {
            return $numero_orden->row();
        } else {
            return false;
        }
    }
    
    function insertar_orden_produccion($data) {
        $this->db->insert('orden_produccion', $data);
    }

    function insertar_materiales_orden_produccion($data) {
        $this->db->insert('materiales_orden_produccion', $data);
    }

    function numero_orden_produccion() {        
        $sql = $this->db->get('orden_produccion');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function mostrar_orden_produccion() {
        $this->db->order_by("fecha", "desc");
        $sql = $this->db->get('orden_produccion');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_orden_produccion($numero) {
        $this->db->where('numero_orden', $numero);
        $this->db->delete('orden_produccion');
        $this->db->where('numero_orden', $numero);
        $this->db->delete('materiales_orden_produccion');
    }

    function editar_orden_produccion($id, $data) {
        $this->db->where('id_orden_pedido', $id);
        $this->db->update('orden_produccion', $data);
    }

    function materiales_orden_produccion($numero) {
        $this->db->where('numero_orden', $numero);
        $sql = $this->db->get('materiales_orden_produccion');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
    ////// Muestra los datos de una orden de produccion
    function datos_orden_produccion($id) {
        $this->db->where('id_orden_produccion', $id);
        $datos = $this->db->get('orden_produccion');
        if ($datos->num_rows() > 0) {
            return $datos->result();
        } else {
            return false;
        }
    }
    
     //// Devuelve el numero de la orden del id que se le pasa por parametro 
    function numero_orden_produccion_id($id) {
        $this->db->select('numero_orden');
        $this->db->where('id_orden_produccion', $id);
        $numero = $this->db->get('orden_produccion');

        if ($numero->num_rows() > 0) {
            return $numero->row();
        } else {
            return false;
        }
    }
    
    function id_numero_orden_produccion($id) {
        $this->db->select('numero_orden');
        $this->db->where('id_materiales_orden_produccion', $id);
        $numero = $this->db->get('materiales_orden_produccion');

        if ($numero->num_rows() > 0) {
            return $numero->row();
        } else {
            return false;
        }
    }
    
    function editar_datos_orden_produccion($id, $data, $numero) {
        $this->db->where('id_orden_produccion', $id);        
        $this->db->update('orden_produccion', $data);
        $this->db->set('numero_orden', $numero);
        $this->db->update('materiales_orden_produccion');
    }
    
    function materiales_orden_produccion_id($id) {
        $this->db->where('id_materiales_orden_produccion', $id);
        $sql = $this->db->get('materiales_orden_produccion');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
    function editar_materiales_orden_produccion($id, $data) {
        $this->db->where('id_materiales_orden_produccion', $id);
        $this->db->update('materiales_orden_produccion', $data);
    }
    
     function id_orden_produccion($numero) {
        $this->db->select('id_orden_produccion');
        $this->db->where('numero_orden', $numero);
        $id = $this->db->get('orden_produccion');
        if ($id->num_rows() > 0) {
            return $id->row();
        } else {
            return false;
        }
    }
    
    function eliminar_materiales_orden_produccion($id) {
        $this->db->where('id_materiales_orden_produccion', $id);
        $this->db->delete('materiales_orden_produccion');
    }

}
