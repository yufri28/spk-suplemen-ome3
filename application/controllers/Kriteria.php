<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Kriteria_model');
    }

    // Halaman utama
    public function index()
    {
        $data = [
            'menu'     => 'kriteria',
            'kriteria' => $this->Kriteria_model->get_all(),
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kriteria', $data); // view tunggal dengan modal
        $this->load->view('admin/templates/footer');
    }

    // Simpan data baru
    public function store()
    {
        $id_kriteria = htmlspecialchars($this->input->post('id_kriteria'));
        $nama_kriteria = htmlspecialchars($this->input->post('nama_kriteria'));
        $jenis_kriteria = htmlspecialchars($this->input->post('jenis_kriteria'));

        // Cek apakah id_kriteria sudah ada
        $cek = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row();

        if ($cek) {
            // Jika sudah ada, kembalikan dengan pesan error
            $this->session->set_flashdata('error', 'Kode Kriteria sudah digunakan, silakan pilih kode lain.');
            redirect('kriteria');
        } else {
            $data = [
                'id_kriteria'   => $id_kriteria,
                'nama_kriteria' => $nama_kriteria,
                'jenis_kriteria'=> $jenis_kriteria
            ];

            $this->Kriteria_model->insert($data);
            $this->session->set_flashdata('success', 'Kriteria berhasil ditambahkan.');
            redirect('kriteria');
        }
    }
    
    // Update data
    public function update($id)
    {
        $data = [
            'nama_kriteria' => htmlspecialchars($this->input->post('nama_kriteria')),
            'jenis_kriteria'=> htmlspecialchars($this->input->post('jenis_kriteria'))
        ];

        $this->Kriteria_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kriteria berhasil diupdate.');
        redirect('kriteria');
    }


    // Hapus data
    public function delete($id)
    {
        $this->Kriteria_model->delete($id);
        $this->session->set_flashdata('success', 'Kriteria berhasil dihapus.');
        redirect('kriteria');
    }
}