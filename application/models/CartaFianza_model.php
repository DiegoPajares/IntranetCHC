<?php

class CartaFianza_model extends CI_Model {

    function cartafianzaQry_listar() {

        $this->db->select('*');
        $this->db->from('cartafianza');
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

    function cartafianzaQry_getxid() {
        if (isset($_POST['id'])) {
            $idcartafianza = $_POST['id'];
        }
        $query = $this->db->query('SELECT * FROM cartafianza WHERE Id= "' . $idcartafianza . '";');
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function cartafianzadetQry_getxidCF() {
        if (isset($_POST['id'])) {
            $idcartafianza = $_POST['id'];
        }
         $this->db->select('d.*,dd.*');
        $this->db->from('cartafianza d');
        $this->db->join('cf_fechas dd', 'dd.det_cartafianza_id = d.id');
        $this->db->where('d.CartaFianza_id', $idcartafianza);
        $this->db->order_by('d.id', 'DESC');
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    
    function CartaFianzaQry_updestado() {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        if (isset($_REQUEST['estado'])) {
            $estado = $_REQUEST['estado'];
        }

        $this->db->set('estado', $estado, FALSE);
        $this->db->where('id', $id);
        $this->db->update('cartafianza');
    }

    function cartafianzaQry_ins() {
        $FielCumplimiento = null;
        $numero = null;
        $gastofinac = null;
        $montorenov = null;
        $fechaemisionini = null;
        $fechavencren = null;
        $obras_id = null;
        
        
        if (isset($_POST['txtFielCumplimiento'])) {
            $FielCumplimiento = $_POST['txtFielCumplimiento'];
        }
        if (isset($_POST['txtnumero'])) {
            $numero = $_POST['txtnumero'];
        }
        if (isset($_POST['txtgastofinac'])) {
            $gastofinac = $_POST['txtgastofinac'];
        }
        if (isset($_POST['txtfechaemision'])) {
            $fechaemisionini = trim($_POST['txtfechaemision']);
            $fechaemisionini = DateTime::createFromFormat('d/m/Y', $fechaemisionini)->format('Y-m-d');
        }
        if (isset($_POST['txtfechaven'])) {
            $fechavencren = trim($_POST['txtfechaven']);
            $fechavencren = DateTime::createFromFormat('d/m/Y', $fechavencren)->format('Y-m-d');
        }
        if (isset($_POST['txtmontorenov'])) {
            $montorenov = $_POST['txtmontorenov'];
        }
        if (isset($_POST['cboObras'])) {
            $obras_id = $_POST['cboObras'];
        }
        
        $data = array(
            'obras_id' => $obras_id,
            'FielCumplimiento' => $FielCumplimiento,
            'numero' => $numero,
            'gastofinac' => $gastofinac,
            'montorenov' => $montorenov,
            'fechaemisionini' => $fechaemisionini,
            'fechavencren' => $fechavencren
        );
        $this->db->insert('cartafianza', $data);
    }
    
    function cartafianzafecQry_ins() {
        if (isset($_POST['cf_id'])) {
            $cartafianza_id = $_POST['cf_id'];
        }
        if (isset($_POST['txtfechaemision'])) {
            $fechaemision = trim($_POST['txtfechaemision']);
            $fechaemision = DateTime::createFromFormat('d/m/Y', $fechaemision)->format('Y-m-d');
        }
        if (isset($_POST['txtfechavencimiento'])) {
            $fechavencimiento = trim($_POST['txtfechavencimiento']);
            $fechavencimiento = DateTime::createFromFormat('d/m/Y', $fechavencimiento)->format('Y-m-d');
        }
         $data = array(
            'cartafianza_id' => $cartafianza_id,
            'fechaemision' => $fechaemision,
            'fechavencimiento' => $fechavencimiento,
            'es_amortizado' => 1,
        );
        $this->db->insert('cf_fechas', $data);
    }
   
    function cartafianzaQry_upd() {

        if (isset($_POST['txtIdEditar'])) {
            $editarID = $_POST['txtIdEditar'];
        }

         $FielCumplimiento = null;
        $numero = null;
        $gastofinac = null;
        $montorenov = null;
        $fechaemisionini = null;
        $fechavencren = null;
        $obras_id = null;
        
        
        if (isset($_POST['txtFielCumplimiento'])) {
            $FielCumplimiento = $_POST['txtFielCumplimiento'];
        }
        if (isset($_POST['txtnumero'])) {
            $numero = $_POST['txtnumero'];
        }
        if (isset($_POST['txtgastofinac'])) {
            $gastofinac = $_POST['txtgastofinac'];
        }
        if (isset($_POST['txtfechaemision'])) {
            $fechaemisionini = trim($_POST['txtfechaemision']);
            $fechaemisionini = DateTime::createFromFormat('d/m/Y', $fechaemisionini)->format('Y-m-d');
        }
        if (isset($_POST['txtfechaven'])) {
            $fechavencren = trim($_POST['txtfechaven']);
            $fechavencren = DateTime::createFromFormat('d/m/Y', $fechavencren)->format('Y-m-d');
        }
        if (isset($_POST['txtmontorenov'])) {
            $montorenov = $_POST['txtmontorenov'];
        }
        if (isset($_POST['cboObras'])) {
            $obras_id = $_POST['cboObras'];
        }
        $data = array(
            'obras_id' => $obras_id,
            'FielCumplimiento' => $FielCumplimiento,
            'numero' => $numero,
            'gastofinac' => $gastofinac,
            'montorenov' => $montorenov,
            'fechaemisionini' => $fechaemisionini,
            'fechavencren' => $fechavencren
        );
        $this->db->where('id', $editarID);
        $this->db->update('cartafianza', $data);
    }

}
