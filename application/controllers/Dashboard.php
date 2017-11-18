<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('master/master_model');
    }

    public function index() {
        $data['actual'] = 'Dashboard';
        //$data['slider_principal'] = $this->master_model->slider_principal('panel_noticias');        
        $data['main_content'] = 'dashboard/dashboard_view';
        $data['titulo'] = 'CHC | Bienvenida';
        $this->load->view('master/template', $data);
    }

}
