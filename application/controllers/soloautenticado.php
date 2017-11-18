<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soloautenticado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
    }

    public function index() {
        $data['actual'] = 'soloautenticado';
        $data['main_content'] = 'soloautenticado/main_view';
        $data['titulo'] = 'WEB | SoloAutenticado';

        $this->load->view('master/template', $data);
    }

}
