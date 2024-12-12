<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user_by_login($login) {
        $this->db->where('login', $login);
        $query = $this->db->get('Utilisateur');
        return $query->row_array();
    }
}
