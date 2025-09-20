<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria_model extends CI_Model {

    protected $table = 'sub_kriteria';

    public function get_all()
    {
        $this->db->select('sub_kriteria.*, kriteria.nama_kriteria');
        $this->db->from($this->table);
        $this->db->join('kriteria', 'kriteria.id_kriteria = sub_kriteria.f_id_kriteria', 'left');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id_sub_kriteria' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_sub_kriteria', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id_sub_kriteria' => $id]);
    }
}