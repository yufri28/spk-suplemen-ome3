<?php
class Suplemen_model extends CI_Model {

    private $table = 'suplemen'; // sesuai DB kamu

    public function get_all() {
        $result = $this->db->get($this->table)->result();

        foreach ($result as &$row) {
            $nilai = $this->db->select('kec_alt_kriteria.f_id_kriteria, sub_kriteria.nama_sub_kriteria, sub_kriteria.id_sub_kriteria')
                            ->from('kec_alt_kriteria')
                            ->join('sub_kriteria', 'sub_kriteria.id_sub_kriteria = kec_alt_kriteria.f_id_sub_kriteria')
                            ->where('f_id_alternatif', $row->id_alternatif)
                            ->get()->result();

            $row->nilai = [];
            foreach ($nilai as $n) {
                $row->nilai[$n->f_id_kriteria] = $n->id_sub_kriteria;
            }
        }

        return $result;
    }


    public function get_by_id($id) {
        return $this->db->where('id_alternatif', $id)->get($this->table)->row();
    }

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); // penting untuk dipakai di kec_alt_kriteria
    }

    public function update($id, $data) {
        return $this->db->where('id_alternatif', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id_alternatif', $id)->delete($this->table);
    }
}