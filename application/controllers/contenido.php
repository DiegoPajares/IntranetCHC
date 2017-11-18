<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contenido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('contenido/contenido_model');
    }

    public function index() {
        $data['actual'] = 'contenido';        
        $data['main_content'] = 'contenido/contenido_view';
        $data['titulo'] = 'WEB | Contenido';

        //$data['db_result'] = $this->db->get('pruebas');
        $data['db_get_result'] = $this->contenido_model->contenidoQry_listar();
        $data['db_select_result'] = $this->contenido_model->contenidoQry_getPostbyID();
        
        $this->load->view('master/template', $data);
    }
    
    public function params($param1, $param2){
        
        //Entrar solo si esta logueado
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
        
        echo "qwerty + " . $param1 . ' + ' . $param2;
        
        //ejecutar como :
        //http://localhost/PruebaCodeigniter/contenido/params/123/456
    }

}
