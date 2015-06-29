<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function actualizar($data)
    {    
        $this->db->update('contador', $data);        
    }
    
    function mostrar()
    {
       $sql = $this->db->get('contador');
       
       if($sql->num_rows()>0)
       {
           return $sql->row();
       }
       else 
        {
           return false;  
        }
    }
}
