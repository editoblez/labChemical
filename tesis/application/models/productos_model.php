<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function mostrar_productos_terminados()
    {
       $this->db->where('cantidad >',0);
       $productos_terminados = $this->db->get('productos_terminados');
       
       if ($productos_terminados->num_rows() > 0) {
            return $productos_terminados->result();
        } else {
            return false;
        }
    }
    
    function tiempo_vida($nombre)
    {
        $this->db->select('tiempo_vida');
        $this->db-where('nombre', $nombre);
        $tiempo = $this->db->get('producto');
        
        if ($tiempo->num_rows() > 0) {
            return $tiempo->result();
        } else {
            return false;
        }
    }
    
    function productos_terminados()
    {       
       $productos_terminados = $this->db->get('productos_terminados');
       
       if ($productos_terminados->num_rows() > 0) {
            return $productos_terminados->result();
        } else {
            return false;
        }
    }
   
}
