<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Kriteria_model');
        $this->load->model('Subkriteria_model');
        $this->load->model('Suplemen_model');
    }
    
	public function index()
	{
        $data = [
            'menu' => 'dashboard',
            'num_kriteria' => $this->Kriteria_model->count_all(),
            'num_subkriteria' => $this->Subkriteria_model->count_all(),
            'num_suplemen' => $this->Suplemen_model->count_all(),
        ];
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/index');
		$this->load->view('admin/templates/footer');
	}
}