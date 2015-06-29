<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('loginModel');         
    }

    public function index() {
        $this->load->view('headers/librerias');
        $this->load->view('login');
        $this->load->view('footer');
    }
    
    public function validarCredenciales ()
    {
        //Establecemos el mensaje por si sucede unu error
        $this->form_validation->set_message('nameInputUser', 'El campo %s es Obligatorio');
        $this->form_validation->set_message('nameInputPassword', 'El campo %s es Obligatorio');
        //Validamos que los campos cumplan con las reglas establecidas
        $this->form_validation->set_rules('nameInputUser', 'Usuario', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('nameInputPassword', 'Contraseña', 'trim|required|md5');
        //Recogemos los datos que vinieron en el post
        $userPost = $this->input->post('nameInputUser');
        $passMD5Post = md5($this->input->post('nameInputPassword'));
        $rol = false;
        //Validamos que Se haya realizado correctamente las validaciones
        if ($this->form_validation->run() == TRUE) {
            $users = $this->loginModel->getUsers();
            if ($users){
                foreach ($users as $user) {
                    if ($user->user == $userPost) {
                        $md5s = $this->loginModel->getMD5fromUser ($userPost, $passMD5Post);
                        if ($md5s){
                            $rol = $md5s[0]->rol;
                             $newdata = array(
                                'username'  => $userPost,
                                'rol'     => $rol,
                                'logged_in' => TRUE
                                 );
                             $this->session->set_userdata($newdata);
                             $this->session->mark_as_temp('logged_in', 300);
                             redirect(base_url());
                        }
                    }
                }    
            }
        }
        $this->load->view('login');
    }
}
