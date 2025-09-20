<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Subkriteria_model');
        $this->load->model('Kriteria_model'); // untuk dropdown relasi
    }

    // Tampilkan semua sub kriteria
    public function index()
    {
        $data = [
            'menu'        => 'subkriteria',
            'subkriteria' => $this->Subkriteria_model->get_all(),
            'kriteria'    => $this->Kriteria_model->get_all()
        ];
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/subkriteria', $data);
        $this->load->view('admin/templates/footer');
    }

    // Simpan data baru
    public function store()
    {
        $data = [
            'nama_sub_kriteria'  => htmlspecialchars($this->input->post('nama_sub_kriteria')),
            'bobot_sub_kriteria' => htmlspecialchars($this->input->post('bobot_sub_kriteria')),
            'f_id_kriteria'      => htmlspecialchars($this->input->post('f_id_kriteria'))
        ];

        $this->Subkriteria_model->insert($data);
        $this->session->set_flashdata('success', 'Sub Kriteria berhasil ditambahkan');
        redirect('subkriteria');
    }

    // Update data
    public function update($id)
    {
        $data = [
            'nama_sub_kriteria'  => htmlspecialchars($this->input->post('nama_sub_kriteria')),
            'bobot_sub_kriteria' => htmlspecialchars($this->input->post('bobot_sub_kriteria')),
            'f_id_kriteria'      => htmlspecialchars($this->input->post('f_id_kriteria'))
        ];

        $this->Subkriteria_model->update($id, $data);
        $this->session->set_flashdata('success', 'Sub Kriteria berhasil diupdate');
        redirect('subkriteria');
    }

    // Hapus data
    public function delete($id)
    {
        $this->Subkriteria_model->delete($id);
        $this->session->set_flashdata('success', 'Sub Kriteria berhasil dihapus');
        redirect('subkriteria');
    }
}