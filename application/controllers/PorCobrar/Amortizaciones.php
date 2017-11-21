<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Amortizaciones extends CI_Controller {
    public $tipo = 'A';
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
        $this->load->model('Cobrarpagardoc_model');
        $this->load->model('Mantenedores/Documento_model');
    }
    //$tipo= 'A';
    
    public function index() {
        $data['actualP'] = 'Por_Cobrar';
        $data['actualH'] = 'Amortizaciones';
        $data['main_content'] = 'por_cobrar/amortizaciones_view';
        $data['page_assets'] = 'advance_form';
        $data['titulo'] = 'INTRANET | Amortizaciones';
        $this->load->view('master/template', $data);
    }
    function calcular_total(){
        if (isset($_POST['valorinicial'])) {
            $valorinicial = $_POST['valorinicial'];
        }
        if (isset($_POST['reajustefp'])) {
            $reajustefp = $_POST['reajustefp'];
        }
        if (isset($_POST['adelantodirecto'])) {
            $adelantodirecto = $_POST['adelantodirecto'];
        }
        if (isset($_POST['adelantomateriales'])) {
            $adelantomateriales = $_POST['adelantomateriales'];
        }
        if (isset($_POST['deduccionrad'])) {
            $deduccionrad = $_POST['deduccionrad'];
        }
        if (isset($_POST['deduccionram'])) {
            $deduccionram = $_POST['deduccionram'];
        }
        $montototal=$valorinicial+$reajustefp-$adelantodirecto-$adelantomateriales-$deduccionrad-$deduccionram;
        return $montototal;
    }
    
    public function docamortizacion_lista() {
        $data = json_encode($this->Documento_model->documentoQry_listar());
        return print_r($data);
    }
    
    public function docamortizacion_listaxID() {
        $data = json_encode($this->Documentoel->documentoQry_getxid());
        return print_r($data);
    }
    
    public function Amortizacion_lista() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_listar($this->tipo));
        return print_r($data);
    }

    public function Amortizacion_listaxObra() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_getxidObra($this->tipo));
        return print_r($data);
    }
    
    public function Amortizacion_listaxID() {
        $data = json_encode($this->Cobrarpagardoc_model->cobrarpagardocQry_getxid($this->tipo));
        return print_r($data);
    }

    public function Amortizacion_Eliminar() {
        $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_eliminar();
        return print_r($data);
    }

    public function Amortizacion_registrar() {
        $montototal = $this->calcular_total();
        if (!empty($_POST["txtIdEditar"])) {
            $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_upd();
        } else {
            $data = $this->Cobrarpagardoc_model->cobrarpagardocQry_ins($montototal,$this->tipo);
        }
        return print_r($data);
    } 
}
