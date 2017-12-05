<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PruebaReporte extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            header("Location: " . MAIN_URL);
        } else {
//            $this->load->model('Reportes/Asignaciones_model');
//            $this->load->model('Tablas/Actividades_model');
//            $this->load->model('Tablas/Labores_model');
//            $this->load->model('Tablas/Consumidores_model');
//            $this->load->model('Tablas/Trabajador_model');
        }
    }

    public function index() {
        $data['actual'] = 'Reportes';
        $data['main_content'] = 'reportes/asignaciones_view';
        $data['titulo'] = 'Costos de Asignaciones por trabajador';

        $this->load->view('master/template', $data);
    }

    public function generaReporte() {
//        $data['fechaIni'] = $_POST['txtFecIni'];
//        $data['fechaFin'] = $_POST['txtFecFin'];
//        $data['actividad'] = ($_POST['txtActividad'] == 0 ? 'Todos': $this->Actividades_model->actividadQry_xid($_POST['txtActividad']) );
//        $data['labor'] = ($_POST['txtLabor'] == 0 ? 'Todos' : $this->Labores_model->laboresQry_xid($_POST['txtLabor']));
//        $data['consumidor'] = ($_POST['txtConsumidor'] == 0 ? 'Todos' : $this->Consumidores_model->consumidoresQry_xid($_POST['txtConsumidor']) );
//        $data['trabajador'] = ($_POST['txtTrabajador'] == 0 ? 'Todos' : $this->Trabajador_model->trabajadorQry_xid($_POST['txtTrabajador']));
//
//        $data['db_get_asignaciones'] = $this->Asignaciones_model->actividadQry_reporte();
        $data['titulo'] = 'Costos de Asignaciones por trabajador';

        $this->load->library('pdf');
        $this->pdf->load_view('reportes/reporte_prueba', $data);
        $this->pdf->set_paper('A4', 'landscape');
        $this->pdf->render();
        $this->pdf->stream("RPT_Prueba.pdf");
    }

    public function verReporte() {

        $this->load->view('reportes/reporte_prueba');
    }

}
