<?php

class Cobrarpagardoc_model extends CI_Model {

    function cobrarpagardocQry_listar($tipo) {
        $this->db->select('*');
        $this->db->from('cobrarpagardoc');
        $this->db->where('Tipo', $tipo);
        $this->db->order_by('documento_id', 'DESC');
        $this->db->order_by('fecha', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function cobrarpagardocQry_getxid($tipo) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $this->db->select('*');
        $this->db->from('cobrarpagardoc');
        $this->db->where('Tipo', $tipo);
        $this->db->where('id', $id);
        $this->db->order_by('documento_id', 'DESC');
        $this->db->order_by('fecha', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function cobrarpagardocQry_getxidObra($tipo) {
        if (isset($_REQUEST['cboobra'])) {
            $id = $_REQUEST['cboobra'];
        }
        $this->db->select('c.*,d.Descripcion as desc_obra');
        $this->db->from('cobrarpagardoc c');
        $this->db->join('documento d', 'c.documento_id = d.id');
        $this->db->where('c.Tipo', $tipo);
        $this->db->where('c.obras_id', $id);
        $this->db->order_by('c.fecha', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function cobrarpagardocQry_getxidObraSumatorias($tipo) {
        if (isset($_POST['cboobra'])) {
            $id = $_POST['cboobra'];
        }
        $this->db->select('c.*,d.Descripcion as desc_obra');
        $this->db->from('cobrarpagardoc c');
        $this->db->join('documento d', 'c.documento_id = d.id');
        $this->db->where('c.Tipo', $tipo);
        $this->db->where('c.obras_id', $id);
        $this->db->order_by('c.fecha', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function cobrarpagardocQry_eliminar() {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        $this->db->where('Id', $id);
        $this->db->update('cobrarpagardoc');
    }

    function cobrarpagardocQry_ins($montototal,$tipo) {
        $obras_id = null;
        $clieprov_id = null;
        $descripcion = null;
        $fecha = null;
        $numero = null;
        $valorinicial = null;
        $reajustefp = null;
        $adelantodirecto = null;
        $adelantomateriales = null;
        $deduccionrad = null;
        $deduccionram = null;
        $pagado = 0;
        $detraccion = 'NO';
        $saldo = $montototal;
        $documento_id = null;
        
        if (isset($_POST['cbodocumento'])) {
            $documento_id = $_POST['cbodocumento'];
        }
        if (isset($_POST['cboobra'])) {
            $obras_id = $_POST['cboobra'];
        }
        if (isset($_POST['clieprov_id'])) {
            $clieprov_id = $_POST['clieprov_id'];
        }
        if (isset($_POST['descripcion'])) {
            $descripcion = $_POST['descripcion'];
        }
        if (isset($_POST['numero'])) {
            $numero = $_POST['numero'];
        }
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
        if (isset($_POST['fecha'])) {
            $fecha = trim($_POST['fecha']);
            $fecha = DateTime::createFromFormat('d/m/Y', $fecha)->format('Y-m-d');
        }
        $data = array(
            'obras_id' => $obras_id,
            'clieprov_id' => $clieprov_id,
            'Descripcion' => $descripcion,
            'Fecha' => $fecha,
            'Numero' => $numero,
            'ValorInicial' => $valorinicial,
            'ReajusteFP' => $reajustefp,
            'AdelantoDirecto' => $adelantodirecto,
            'AfdelantoMateriales' => $adelantomateriales,
            'DeduccionRAD' => $deduccionrad,
            'DeduccionRAM' => $deduccionram,
            'MontoTotal' => $montototal,
            'Pagado' => $pagado,
            'Saldo' => $saldo,
            'Tipo' => $tipo,
            'Detraccion' => $detraccion,
            'documento_id' => $documento_id,
        );
        $this->db->insert('cobrarpagardoc', $data);
    }

    function cobrarpagardocQry_upd($pagado,$saldo) {
        if($saldo=0){
            $detraccion = 'SI';
        }else{
            $detraccion = 'NO';
        }
        
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $data = array(
            'Pagado' => $pagado,
            'Saldo' => $saldo,
            'Detraccion' => $detraccion,
        );
        
        $this->db->where('id', $id);
        $this->db->update('cobrarpagardoc', $data);
    }

}
