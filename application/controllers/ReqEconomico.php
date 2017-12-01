<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReqEconomico extends CI_Controller {
    public $tipo = 'A';
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
        $this->load->model('Cobrarpagardoc_model');
        $this->load->model('Mantenedores/Documento_model');
    }
    
    
    public function index() {
        $data['actualP'] = 'Requerimiento Económico';
        $data['actualH'] = 'ReqEconomico';
        $data['main_content'] = 'reqeconomico_view';
        $data['page_assets'] = 'advance_form';
        $data['titulo'] = 'INTRANET | ReqEconomico';
        $this->load->view('master/template', $data);
    }
    
        
    public function ReqEconomico_lista() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_listar($this->tipo));
        return print_r($data);
    }

    public function ReqEconomico_listaxObra() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_getxidObra($this->tipo));
        return print_r($data);
    }
    
    public function ReqEconomico_listaxID() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_getxid($this->tipo));
        return print_r($data);
    }

    public function ReqEconomico_Eliminar() {
        $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_eliminar();
        return print_r($data);
    }

    public function ReqEconomico_registrar() {
        $montototal = $this->calcular_total();
        if (!empty($_POST["txtIdEditar"])) {
            $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_upd();
        } else {
            $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_ins($montototal,$this->tipo);
        }
        return print_r($data);
    } 
}
