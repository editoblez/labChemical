<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertar_usuario($data) {
        $this->db->insert('usuario', $data);
    }
    
    function mostrar_usuario() {
        $sql = $this->db->get('usuario');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_usuario($id) {
        $this->db->where('idusuario', $id);
        $this->db->delete('usuario');
    }

    function usuario_id($id) {
        $this->db->where('idusuario', $id);
        $sql = $this->db->get('usuario');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function atualizar_usuario($id, $data) {
        $this->db->where('idusuario', $id);
        $this->db->update('usuario', $data);
    }

    function insertar_mat_prima($data) {
        $this->db->insert('materia_prima', $data);
    }

//    function insertar_mat_prima_bodega($data) {
//        $this->db->insert('bodega_produccion', $data);
//    }
    
//    function insertar_materia_prima_bodega($data) {
//        $this->db->insert('materia_prima_bodega', $data);
//    }
    
//    function insertar_materia_prima_laboratorio($data) {
//        $this->db->insert('materia_prima_laboratorio', $data);
//    }
    function mostrar_mat_prima() {
        $sql = $this->db->get('materia_prima');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_mat_prima($id) {
        $this->db->where('idmateria_prima', $id);
        $this->db->delete('materia_prima');
    }

    function mat_prima_id($id) {
        $this->db->where('idmateria_prima', $id);
        $sql = $this->db->get('materia_prima');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
   function get_nombre_materia_prima($id) {
        $this->db->where('idmateria_prima', $id);
        $sql = $this->db->get('materia_prima');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    function get_id_materia($nombre_materia) {
        $this->db->where('nombre_materia', $nombre_materia);
        $sql = $this->db->get('materia_prima');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

    function atualizar_mat_prima($id, $data) {
        $this->db->where('idmateria_prima', $id);
        $this->db->update('materia_prima', $data);
    }

    function insertar_producto($data) {
        $this->db->insert('producto', $data);
    }
    
    function get_id_formula($nombre_formula) {
        $this->db->where('nombre_formula', $nombre_formula);
        $sql = $this->db->get('formula');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

//    function insertar_productos_terminados($data) {
//        $this->db->insert('productos_terminados', $data);
//    }

    function mostrar_producto() {
        $sql = $this->db->get('producto');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_producto($id) {
        $this->db->where('idproducto', $id);
        $this->db->delete('producto');
    }

    function producto_id($id) {
        $this->db->where('idproducto', $id);
        $sql = $this->db->get('producto');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function atualizar_producto($id, $data) {
        $this->db->where('idproducto', $id);
        $this->db->update('producto', $data);
    }

    function insertar_formula($data) {
        $this->db->insert('formula', $data);
    }

    function id_formula($nombre) {
        $this->db->select('idformula');
        $this->db->where('nombre_formula', $nombre);
        $sql = $this->db->get('formula');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

//    function insertar_ingredientes_formula($data) {
//        $this->db->insert('ingredientes_formula', $data);
//    }

    function mostrar_formula() {
        $sql = $this->db->get('formula');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    //////Busca el nombre de la formula pasandole ei id/////////////////////////

    function nombre_formula($id) {
        $this->db->select('nombre_formula');
        $this->db->where('idformula', $id);
        $sql = $this->db->get('formula');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        } else {
            return false;
        }
    }

    function materiales_formula($nombre) {
        $this->db->where('nombre_formula', $id);    
        $sql = $this->db->get('materiales_formula');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }
    
    
    
    

    function buscar_nombre() {
        $this->db->select('nombre_formula');
        $sql = $this->db->get('formula');

        if ($sql->num_rows() > 0) {
            return $sql->result();
        } else {
            return false;
        }
    }

    function eliminar_formula($nombre) {
        $this->db->where('nombre_formula', $nombre);
        $this->db->delete('formula');
        //$this->db->where('nombre_formula', $nombre);
        //$this->db->delete('ingredientes_formula');
    }

//    function costo_mat_prima($nombre) {
//        $this->db->select('costo');
//        $this->db->where('nombre_materia_prima', $nombre);
//        $costo = $this->db->get('materia_prima');
//
//        if ($costo->num_rows() > 0) {
//            return $costo->row();
//        } else {
//            return false;
//        }
//    }

    function actualizar_nombre_formula($id, $nombre) {
        $this->db->where('idformula', $id);
        $this->db->set('nombre_formula', $nombre);
        $this->db->update('formula');
//        $this->db->where('idformula', $id);
//        $this->db->set('nombre', $nombre);
//        $this->db->update('ingredientes_formula');
    }

//    function eliminar_ingrediente_formula($id) {
//        $this->db->where('id_ingredientes_formula', $id);
//        $this->db->delete('ingredientes_formula');
//    }

//    function buscar_id_formula($id) {
//        $this->db->select('idformula');
//        $this->db->where('id_ingredientes_formula', $id);
//        $id_formula = $this->db->get('ingredientes_formula');
//
//        if ($id_formula->num_rows() > 0) {
//            return $id_formula->row();
//        } else {
//            return false;
//        }
//    }

    ////// Busca un ingrediente de la tabla ingredientes_formula por el id ///////////

//    function ingrediente($id) {
//        $this->db->where('id_ingredientes_formula', $id);
//        $datos = $this->db->get('ingredientes_formula');
//
//        if ($datos->num_rows() > 0) {
//            return $datos->result();
//        } else {
//            return false;
//        }
//    }

//    function actualizar_ingrediente_formula($id, $nombre, $cantidad) {
//        $this->db->where('id_ingredientes_formula', $id);
//        $this->db->set('ingredientes', $nombre);        
//        $this->db->set('cantidad', $cantidad);
//        $this->db->update('ingredientes_formula');
//    }

}
