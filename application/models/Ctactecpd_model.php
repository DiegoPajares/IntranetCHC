<?php

class Ctactecpd_model extends CI_Model {

    function ctactecpdQry_getxAmortización() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        $this->db->select('*');
        $this->db->from('ctactecpd');
        $this->db->where('CobrarPagarDoc_id', $id);
        $query = $this->db->get();
        
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function ctactecpdQry_eliminar() {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        $this->db->where('id', $id);
        $this->db->update('ctactecpd');
    }
    
    function ctactecpdQry_ins() {
        $Pago = null;
        $Fecha = null;
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];
        }
        
        if (isset($_POST['fecha'])) {
            $Fecha = trim($_POST['fecha']);
            $Fecha = DateTime::createFromFormat('d/m/Y', $Fecha)->format('Y-m-d');
        }
        if (isset($_POST['pago'])) {
            $Pago = $_POST['pago'];
        }


        $data = array(
            'Pago' => $Pago,
            'Fecha' => $Fecha,
            'CobrarPagarDoc_id' =>$id,
        );
        $this->db->insert('ctactecpd', $data);
    }

}
