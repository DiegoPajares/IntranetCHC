<?php

class Obra_model extends CI_Model {

    function mantenedoresQry_listar_obra() {

        $query = $this->db->query('select * from obras where Estado in (0,1,2) order by Id DESC;');

        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function mantenedoresQry_get_obra_x_id($idobra) {
        $query = $this->db->query('SELECT * FROM obras WHERE Id= "' . $idobra . '";');
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

    function mantenedoresQry_upd_estado_obra($idobra, $Estado) {

        $this->db->set('Estado', $Estado, FALSE);
        $this->db->where('Id', $idobra);
        $this->db->update('obras');
    }

    function mantenedoresQry_ins_obra() {

        $Obra_NombreCorto = null;
        $Obra_Nombre = null;
        $Obra_Empresa = null;
        $Obra_MontoInicial = null;
        

        if (isset($_POST['nombrecorto'])) {
            $Obra_NombreCorto = $_POST['nombrecorto'];
        }
        if (isset($_POST['nombre'])) {
            $Obra_Nombre = $_POST['nombre'];
        }

        if (isset($_POST['empresa'])) {
            $Obra_Empresa = $_POST['empresa'];
        }

        if (isset($_POST['montoinicial'])) {
            $Obra_MontoInicial = $_POST['montoinicial'];
        }
        $data = array(
            'NombreCorto' => $Obra_NombreCorto,
            'Nombre' => $Obra_Nombre,
            'Empresa' => $Obra_Empresa,
            'Monto_Inicial' => $Obra_MontoInicial,
        );

        $this->db->insert('obras', $data);
    }

    function mantenedoresQry_upd_obra() {

        $Obra_NombreCorto = null;
        $Obra_Nombre = null;
        $Obra_Empresa = null;
        $Obra_MontoInicial = null;


        if (isset($_POST['edtnombrecorto'])) {
            $Obra_NombreCorto = $_POST['edtnombrecorto'];
        }
        if (isset($_POST['edtnombre'])) {
            $Obra_Nombre = $_POST['edtnombre'];
        }
        if (isset($_POST['edtempresa'])) {
            $Obra_Empresa = $_POST['edtempresa'];
        }
        if (isset($_POST['edtmontoinicial'])) {
            $Obra_MontoInicial = $_POST['edtmontoinicial'];
        }
        $data = array(
            'NombreCorto' => $Obra_NombreCorto,
            'Nombre' => $Obra_Nombre,
            'Empresa' => $Obra_Empresa,
            'Monto_Inicial' => $Obra_MontoInicial,
        );

        $this->db->where('Id', $_POST['txtEdtIdobra']);
        $this->db->update('obras', $data);
    }

}
