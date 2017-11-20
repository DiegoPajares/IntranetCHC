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
        $this->db->and_where('id', $id);
        $this->db->order_by('documento_id', 'DESC');
        $this->db->order_by('fecha', 'DESC');
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
        
        if (isset($_POST['documento_id'])) {
            $documento_id = $_POST['documento_id'];
        }
        if (isset($_POST['obras_id'])) {
            $obras_id = $_POST['obras_id'];
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

    function cobrarpagardocQry_upd() {
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
        $editarID = null;
        
        if (isset($_POST['txtIdEditar'])) {
            $editarID = $_POST['txtIdEditar'];
        }
        if (isset($_POST['documento_id'])) {
            $documento_id = $_POST['documento_id'];
        }
        if (isset($_POST['obras_id'])) {
            $obras_id = $_POST['obras_id'];
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
        
        $this->db->where('id', $editarID);
        $this->db->update('cobrarpagardoc', $data);
    }

}
