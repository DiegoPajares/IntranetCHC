<?php

class Obras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        }
        $this->load->model('mantenedores/Obra_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_lib');
    }

    public function index() {
        $data['actualP'] = 'Mantenedor';
        $data['actualH'] = 'Proyectos/Obras';
        $data['main_content'] = 'mantenedores/obras_view';
        $data['page_assets'] = 'advance_form';
        $data['titulo'] = 'INTRANET | Obras';
        $this->load->view('master/template', $data);

    }

    public function listaObras() {
        $data = json_encode($this->Obra_model->MantenedoresQry_listar_obra()->result());
        return print_r($data);
    }

    public function getObra_x_ID() {
        $idObra = $_REQUEST["idObra"];
        $data = json_encode($this->Obra_model->MantenedoresQry_get_obra_x_id($idObra)->result());
        return print_r($data);
    }

    public function actualizaEstadoObra() {

        $idObra = $_REQUEST["idObra"];
        $accion = $_REQUEST["accion"];

        if ($accion == 1) {
            if ($this->Obra_model->MantenedoresQry_get_obra_x_id($idObra)->result()[0]->Obra_Estado == 1) {
                $Estado = 0;
            } else {
                if ($this->Obra_model->MantenedoresQry_get_obra_x_id($idObra)->result()[0]->Obra_Estado == 0) {
                    $Estado = 1;
                } else {
                    $Estado = 100;
                }
            }
        } else {
            $Estado = 3;
        }

        if ($Estado !== 100) {
            $this->Obra_model->MantenedoresQry_upd_estado_obra($idObra, $Estado);
        } else {
            echo 'No es posible cambiar el estado';
        }
    }

    public function obra_registrarAjax() {

        date_default_timezone_set('America/Lima');
        $date = date('mdY_his', time());
        if (isset($_POST["txtEdtIdobra"])) {
            $data = $this->Obra_model->recursoshumanosQry_upd_obra();
                echo 'Editado';
        } else {
            $data = $this->Obra_model->recursoshumanosQry_ins_obra();
            echo 'Registrado';
        }
    }

}
