<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function index() {
        // cek apakah sudah ada akun admin
        if ($this->Login_model->count_all() == 0) {
            // buat akun default admin
            $this->Login_model->insert([
                'username' => 'admin',
                'password' => password_hash('admin123', PASSWORD_BCRYPT) // default password
            ]);
        }

        // jika sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->get_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'id_admin'  => $user->id_admin,
                'username'  => $user->username,
                'logged_in' => TRUE
            ]);

            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}