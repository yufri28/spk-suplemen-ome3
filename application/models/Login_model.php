<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    private $table = 'login';

    public function get_by_username($username) {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }
}