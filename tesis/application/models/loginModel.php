<?php
class loginModel extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    public function getUsers (){
        $this->db->select('user');
        $userNames = $this->db->get('usuarios');   
        if ($userNames->num_rows() > 0) {
            return $userNames->result();
        } else {
            return false;
        }
    }
    
    public function getMD5fromUser ($userName, $passMD5){
        $this->db->where('user', $userName);
        $this->db->where('contraseña', $passMD5);
        $userNames = $this->db->get('usuarios');   
         if ($userNames->num_rows() > 0) {
            return $userNames->result ();
        } else {
            return false;
        }
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

