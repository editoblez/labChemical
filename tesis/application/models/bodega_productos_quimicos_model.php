<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bodega_productos_quimicos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function mat_prima() {

        $sql = $this->db->get('materia_prima_produ');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function insertar_mat_prima($data) {
        $this->db->insert('bodega_productos_quimicos', $data);
    }

    function mostrar_id_mat_prima() {
        $this->db->group_by('numero_solicitud');
        $sql = $this->db->get('bodega_productos_quimicos');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
    function mostrar_mat_prima() {
        $sql = $this->db->get('bodega_productos_quimicos');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_mat_prima($id) {
        $this->db->where('id_mat_prima', $id);
        $this->db->delete('bodega_productos_quimicos');
    }
    
    function eliminar_solicitud_by_ID($id_pedido) {
        $this->db->where('numero_solicitud', $id_pedido);
        $this->db->delete('bodega_productos_quimicos');
    }

    function mat_prrima_id($id) {
        $this->db->where('id_mat_prima', $id);
        $sql = $this->db->get('bodega_productos_quimicos');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
            function pedido_numero_solicitud($numero_solicitud) {
        $this->db->where('numero_solicitud', $numero_solicitud);
        $sql = $this->db->get('bodega_productos_quimicos');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function actualizar_mat_prima($id, $data) {
        $this->db->where('id_mat_prima', $id);
        $this->db->update('bodega_productos_quimicos', $data);
    }

    function buscar_mat_prima($nom) {
        $this->db->like('nom_mat_prima', $nom);
        $sql = $this->db->get('bodega_productos_quimicos');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function editar_costo($nombre, $costo) {
        
        $this->db->where('nombre', $nombre);
        $this->db->set('costo', $costo);
        $this->db->update('materia_prima_produ');
    }
    
    function get_cantidad_materia_prima($nombre_materia="")
    {
        $this->db->where('nombre', $nombre_materia);
        $result = $this->db->get('materia_prima_bodega');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            return $cantidad = $row->cantidad;
        } else {
            return 0;
        }
    }
    
    function actualizar_materia_prima_bodega ($data) {
        $nombre = $data['nom_mat_prima'];
        $this->db->where('nombre', $nombre_materia);
        $result = $this->db->get('materia_prima_bodega');
        if ($result->num_rows() > 0) {
            $row = $result->row();
            $cantidad = $row->cantidad;
        } else {
            return 0;
        }
        $cantidad += $data['cantidad'];
        $this->db->where('nombre', $data['nom_mat_prima']);
        $this->db->set('cantidad', $cantidad);
        $this->db->update('materia_prima_bodega');
    }
    
    
}
