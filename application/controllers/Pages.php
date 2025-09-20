<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kriteria_model');
		$this->load->model('Subkriteria_model');
		$this->load->model('Suplemen_model');
		$this->load->model('Hasil_model');
	}

	public function index()
    {
        $kriteria = $this->Kriteria_model->get_all();
        $alternatif = $this->Suplemen_model->get_all();

        // Array nama kriteria untuk perbandingan berpasangan
        $array = [];
        foreach ($kriteria as $row) {
            $array[] = $row->nama_kriteria;
        }

        // Skala AHP
        $array_skala = [
            ['nilai' => 1, 'keterangan' => 'Kedua Kriteria sama penting'],
            ['nilai' => 3, 'keterangan' => 'Salah satu sedikit lebih penting'],
            ['nilai' => 5, 'keterangan' => 'Salah satu lebih penting'],
            ['nilai' => 7, 'keterangan' => 'Salah satu sangat lebih penting'],
            ['nilai' => 9, 'keterangan' => 'Salah satu mutlak lebih penting'],
            ['nilai' => 2, 'keterangan' => 'Ragu-ragu antara kedua Kriteria yang dibandingkan']
        ];

        $data = [
            'menu'        => 'rekomendasi',
            'kriteria'    => $kriteria,
            'alternatif'  => $alternatif,
            'array'       => $array,
            'array_skala' => $array_skala
        ];

        // Jika form disubmit
        if ($this->input->method() == 'post') {
            $input = $this->input->post();

            // Hitung AHP
            $data['hasilAHP'] = $this->Hasil_model->hitungAHP($kriteria, $input);

            // Hitung MAUT dengan bobot AHP
            $data['hasilMAUT'] = $this->Hasil_model->hitungMAUT($alternatif, $data['hasilAHP']['bobot']);
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/templates/footer');
    }


}