<?php

class Login_model extends CI_Model {

    function loginQry_login($nombre, $password) {

        $query = $this->db->query('SELECT * FROM bd_pruebas.usuarios where nombre_usuario = "' . $nombre . '" and password_usuario = "' . $password . '";');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

}
