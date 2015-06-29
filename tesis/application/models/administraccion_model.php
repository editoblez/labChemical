<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administraccion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertar_usuario($data) {
        $this->db->insert('usuarios', $data);
    }

    function mostrar_usuario() {
        $sql = $this->db->get('usuarios');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_usuario($id) {
        $this->db->where('id_usuario', $id);
        $this->db->delete('usuarios');        
    }
    function usuario_id($id)
    {
        $this->db->where('id_usuario', $id);
        $sql = $this->db->get('usuarios');
        
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    function atualizar_usuario($id,$data)
    {
       $this->db->where('id_usuario', $id);
       $this->db->update('usuarios', $data);  
    }
    
     function insertar_mat_prima($data) {
        $this->db->insert('materia_prima_produ', $data);
    }
    function insertar_mat_prima_bodega($data) {
        $this->db->insert('bodega_produccion', $data);
    }

    function mostrar_mat_prima() {
        $sql = $this->db->get('materia_prima_produ');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_mat_prima($id) {
        $this->db->where('id_materia_prima', $id);
        $this->db->delete('materia_prima_produ');        
    }
    function mat_prima_id($id)
    {
        $this->db->where('id_materia_prima', $id);
        $sql = $this->db->get('materia_prima_produ');
        
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    function atualizar_mat_prima($id,$data)
    {
       $this->db->where('id_materia_prima', $id);
       $this->db->update('materia_prima_produ', $data);  
    }
    
     function insertar_producto($data) {
        $this->db->insert('producto', $data);
    }

    function mostrar_producto() {
        $sql = $this->db->get('producto');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_producto($id) {
        $this->db->where('id_producto', $id);
        $this->db->delete('producto');        
    }
    function producto_id($id)
    {
        $this->db->where('id_producto', $id);
        $sql = $this->db->get('producto');
        
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    function atualizar_producto($id,$data)
    {
       $this->db->where('id_producto', $id);
       $this->db->update('producto', $data);  
    }    
    
    
    function insertar_ingredientes($data)
    {
        $this->db->insert('ingredientes_formula', $data);
    }
    
     function insertar_formula($data)
    {
        $this->db->insert('formula', $data);
    }
    
    function mostrar_ingredientes()
    {
       
        $sql = $this->db->get('ingredientes_formula');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
}
