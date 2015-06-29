<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validacion_model extends CI_Model {

    function __construct() {
        parent::__construct();        
    }

    function obtener_usuarios()
    {
        $this->db->select('user');
        $usuarios = $this->db->get('usuarios');        
        return $usuarios;
    }
   
}
