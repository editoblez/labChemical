<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertar_clientes($data) {
        $this->db->insert('clientes', $data);
    }

    function mostrar_clientes() {
        $sql = $this->db->get('clientes');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_clientes($id) {
        $this->db->where('id_clientes', $id);
        $this->db->delete('clientes');
    }

    function clientes_id($id) {
        $this->db->where('id_clientes', $id);
        $sql = $this->db->get('clientes');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function atualizar_clientes($id, $data) {
        $this->db->where('id_clientes', $id);
        $this->db->update('clientes', $data);
    }

    function buscar_clientes($nom) {
        $this->db->like('nombre', $nom);
        $sql = $this->db->get('clientes');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

}
