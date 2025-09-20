<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplemen extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
        $this->load->model('Suplemen_model');
    }

    public function index() {
		$suplemen = $this->Suplemen_model->get_all();

		foreach ($suplemen as &$s) {
			$nilai = $this->db->select('kec_alt_kriteria.f_id_kriteria, sub_kriteria.id_sub_kriteria, sub_kriteria.nama_sub_kriteria')
							->from('kec_alt_kriteria')
							->join('sub_kriteria', 'sub_kriteria.id_sub_kriteria = kec_alt_kriteria.f_id_sub_kriteria')
							->where('f_id_alternatif', $s->id_alternatif)
							->get()
							->result();

			$map = [];
			foreach ($nilai as $n) {
				$map[$n->f_id_kriteria] = [
					'id'   => $n->id_sub_kriteria,
					'nama' => $n->nama_sub_kriteria
				];
			}
			$s->nilai = $map; // contoh: [2 => ['id'=>5,'nama'=>'Murah']]
		}


		$data = [
			'suplemen'   => $suplemen,
			'menu'       => 'suplemen',
			'kriteria'   => $this->Kriteria_model->get_all(),
			'subkriteria'=> $this->Subkriteria_model->get_all(),
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/suplemen', $data);
		$this->load->view('admin/templates/footer');
	}

    public function store() {
		$upload_data = $this->_do_upload();
		if (!$this->input->post('nama_alternatif')) {
			$this->session->set_flashdata('error', 'Nama Alternatif wajib diisi!');
			redirect('suplemen');
		}


		$altData = [
			'nama_alternatif' => $this->input->post('nama_alternatif'),
			'gambar'          => $upload_data
		];

		// simpan ke tabel suplemen
		$alt_id = $this->Suplemen_model->insert($altData);

		// ambil input kriteria (array)
		$kriteria_input = $this->input->post('kriteria');
		if ($kriteria_input && is_array($kriteria_input)) {
        foreach ($kriteria_input as $id_kriteria => $id_sub_kriteria) {
            if (!empty($id_sub_kriteria)) {
					$this->db->insert('kec_alt_kriteria', [
						'f_id_alternatif'   => $alt_id,
						'f_id_kriteria'     => $id_kriteria,
						'f_id_sub_kriteria' => $id_sub_kriteria
					]);
				}
			}
		}

		$this->session->set_flashdata('success', 'Data berhasil disimpan!');
		redirect('suplemen');
	}


    public function update($id) {
		if (!$this->input->post('nama_alternatif')) {
			$this->session->set_flashdata('error', 'Nama Alternatif wajib diisi!');
			redirect('suplemen');
		}

		$old_gambar = $this->input->post('old_gambar');
		$upload_data = $this->_do_upload($old_gambar);

		$altData = [
			'nama_alternatif' => $this->input->post('nama_alternatif'),
			'gambar'          => $upload_data
		];

		$this->Suplemen_model->update($id, $altData);

		// Hapus data lama
		$this->db->delete('kec_alt_kriteria', ['f_id_alternatif' => $id]);

		// Simpan ulang
		$kriteria_input = $this->input->post('kriteria');
		if ($kriteria_input && is_array($kriteria_input)) {
			foreach ($kriteria_input as $id_kriteria => $id_sub_kriteria) {
				if (!empty($id_sub_kriteria)) {
					$this->db->insert('kec_alt_kriteria', [
						'f_id_alternatif'   => $id,
						'f_id_kriteria'     => $id_kriteria,
						'f_id_sub_kriteria' => $id_sub_kriteria
					]);
				}
			}
		}

		$this->session->set_flashdata('success', 'Data berhasil diupdate!');
		redirect('suplemen');
	}


    public function delete($id) {
		$suplemen = $this->Suplemen_model->get_by_id($id);
		if ($suplemen && $suplemen->gambar && file_exists(FCPATH.'uploads/'.$suplemen->gambar)) {
			unlink(FCPATH.'uploads/'.$suplemen->gambar);
		}

		// hapus relasi subkriteria
		$this->db->delete('kec_alt_kriteria', ['f_id_alternatif' => $id]);

		$this->Suplemen_model->delete($id);

		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		redirect('suplemen');
	}

    private function _do_upload($old_file = null) {
		if (!empty($_FILES['gambar']['name'])) {
			$config['upload_path']   = FCPATH . 'uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			// $config['max_size']      = 2048;
			$config['file_name']     = time() . '-' . $_FILES['gambar']['name'];

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				// Hapus file lama kalau ada
				if ($old_file && file_exists(FCPATH . 'uploads/' . $old_file)) {
					unlink(FCPATH . 'uploads/' . $old_file);
				}
				return $this->upload->data('file_name');
			} else {
				// Kalau gagal upload
				$this->session->set_flashdata('error', $this->upload->display_errors());
				return $old_file; // pakai file lama
			}
		}
		return $old_file; // tidak upload baru → pakai lama
	}

}