<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }
    
	public function index()
	{
        $data = [
            'menu' => 'dashboard'
        ];
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/index');
		$this->load->view('admin/templates/footer');
	}
}