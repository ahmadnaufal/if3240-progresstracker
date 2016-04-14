<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesan_model', 'pesan');
	}

	public function formAddPesan()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pesan/form.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function addPesan()
	{
		$id_proyek = $this->input->post("id_proyek");
		$this->form_validation->set_rules('konten', 'Nama Proyek', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$pesan_data['konten'] = $this->input->post("konten");
			$pesan_data['id_channel'] = $this->input->post("id_channel");
			$pesan_data['username_pengguna'] = $this->session->userdata('logged_in')['username'];


			if ($result_id = $this->pesan->insert_new_pesan($pesan_data)) {
				$this->session->set_flashdata('success', "Pembuatan Pesan berhasil!");
				redirect('proyek/'.$id_proyek.'/channel/'.$pesan_data['id_channel']);
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/'.$id_proyek.'/channel/'.$pesan_data['id_channel']);
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('proyek/'.$id_proyek.'/channel/'.$pesan_data['id_channel']);

		}
	}

}
