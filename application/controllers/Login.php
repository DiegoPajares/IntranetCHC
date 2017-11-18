<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login/login_model');
    }

    public function index() {                
        $this->load->view('login_view');
    }

    public function iniciarSesion() {
        $nombre = $this->input->post('nombre');
        $password = md5($this->input->post('password'));

//        echo $nombre . ' ' . $password;

        $resultado = $this->login_model->loginQry_login($nombre, $password);

        if ($resultado != null) {
            //print_r($resultado);
            if ($resultado->password_usuario == $password) {

                $data = array(
                    'nombre' => $nombre,
                    'id' => $resultado->id_usuario,
                    'login' => true
                );
                //Guardar datos en sesion
                $this->session->set_userdata($data);
                header("Location: " . MAIN_URL . "/contenido");
                //echo 'USER: ' . $this->session->userdata('nombre') . ' <br />ID: ' . $this->session->userdata('id');
            } else {
                header("Location: " . MAIN_URL);
                die();
            }
        } else {
            header("Location: " . MAIN_URL);
            die();
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        header("Location: " . MAIN_URL);
    }

}
