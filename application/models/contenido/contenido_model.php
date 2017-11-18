<?php

class Contenido_model extends CI_Model {

    function contenidoQry_listar() {       
        
        $query = $this->db->get('pruebas');
        
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }
    
    function contenidoQry_getPostbyID() {        
        
        $query = $this->db->query('SELECT * FROM bd_pruebas.pruebas where id_pruebas = 1;');
        
        if (count($query) > 0) {
            return $query;
        } else {
            return null;
        }
    }

}
