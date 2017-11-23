<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CartaFianza extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
        $this->load->model('CartaFianza_model');
    }

    public function index() {
        $data['actualP'] = 'CartaFianza';
        $data['actualH'] = 'CartaFianza';
        $data['main_content'] = 'cartafianza_view';
        $data['page_assets'] = 'advance_form';
        $data['titulo'] = 'INTRANET | CartaFianza';
        $this->load->view('master/template', $data);
    }

    public function CartaFianza_lista() {
        $data = json_encode($this->CartaFianza_model->cartafianzaQry_listar());
        return print_r($data);
    }

    public function CartaFianzaDet_listaxIDCF() {
        $data = json_encode($this->CartaFianza_model->cartafianzadetQry_getxidCF());
        return print_r($data);
    }

    public function CartaFianza_listaxID() {
        $data = json_encode($this->CartaFianza_model->cartafianzaQry_getxid());
        return print_r($data);
    }
    
    public function CartaFianza_actualizaEstado() {
        $data = $this->CartaFianza_model->cartafianzaQry_updestado();
        return print_r($data);
    }
    
    public function CartaFianzaFec_actualizaEstado() {
        $data = $this->CartaFianza_model->cartafianzafecQry_ins();
        return print_r($data);
    }

    
    public function CartaFianza_registrar() {
        if (!empty($_POST["txtIdEditar"])) {
            $data = $this->CartaFianza_model->cartafianzaQry_upd();
        } else {
            $data = $this->CartaFianza_model->cartafianzaQry_ins();
        }
        return print_r($data);
    }
}
