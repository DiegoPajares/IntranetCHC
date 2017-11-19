<?php

class Obra_model extends CI_Model {

    function obraQry_listar() {

        $this->db->select('*');
        $this->db->from('obras');
        $this->db->where('estado', 1);
        $this->db->or_where('estado', 0);
        $this->db->or_where('estado', 2);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function obraQry_getxid() {
        if (isset($_POST['id'])) {
            $idobra = $_POST['id'];
        }
        $query = $this->db->query('SELECT * FROM obras WHERE Id= "' . $idobra . '";');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function ObraQry_updestado($idobra, $Estado) {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        if (isset($_REQUEST['estado'])) {
            $estado = $_REQUEST['estado'];
        }

        $this->db->set('Estado', $Estado, FALSE);
        $this->db->where('Id', $idobra);
        $this->db->update('obras');
    }

    function obraQry_ins() {
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

    function obraQry_upd() {

        $Obra_NombreCorto = null;
        $Obra_Nombre = null;
        $Obra_Empresa = null;
        $Obra_MontoInicial = null;
        $editarID = null;
        
        if (isset($_POST['txtIdEditar'])) {
            $editarID = $_POST['txtIdEditar'];
        }

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
        $this->db->where('id', $editarID);
        $this->db->update('obras', $data);
    }

}
