<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Proyek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proyek_model', 'proyek');
	}

	public function index()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			if ($userdata['tipe'] == 0) {

				$proyek = $this->proyek->get_proyek_by_client($userdata['username']);
				if ($proyek)
					redirect('proyek/getProyek/'.$proyek['id']);
				else {
					$this->session->unset_userdata('logged_in');
					redirect('autentikasi');
				}

			} else {
				$data['daftar_proyek'] = $this->proyek->get_all_proyek();
				$data['userdata'] = $userdata;

				$this->load->view('templates/html.php');
				$this->load->view('templates/header.php', $data);
				$this->load->view('proyek/daftar.php', $data);
				$this->load->view('templates/footer.php');
			}
		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function getProyek($id)
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			$data['proyek'] = $this->proyek->get_proyek_by_id($id);
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('proyek/detail.php', $data);
			$this->load->view('templates/footer.php');
		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function formAddProyek()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			if ($userdata['tipe'] == 0) {

				$proyek = $this->proyek->get_proyek_by_client($userdata['username']);
				if ($proyek)
					redirect('proyek/getProyek/'.$proyek['id']);
				else {
					$this->session->unset_userdata('logged_in');
					redirect('autentikasi');
				}

			} else {
				$data['userdata'] = $userdata;

				$this->load->view('templates/html.php');
				$this->load->view('templates/header.php', $data);
				$this->load->view('proyek/form.php');
				$this->load->view('templates/footer.php');
			}

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function addProyek()
	{
		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Proyek', 'trim|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$username = $this->input->post("$username");
			$password = hash("sha512", $this->input->post("password"));

			if ($userdata = $this->user->get_pengguna_by_username($username)) {

				if ($userdata['password'] == $password) {
					unset($userdata['password']);
					$this->session->set_userdata('logged_in', $userdata);
					$this->session->set_flashdata('welcome_message', "Selamat datang kembali, " . $userdata['username']);

					redirect('autentikasi');
				} else {
					$this->session->set_flashdata('error', "Password salah!");
					redirect('autentikasi');
				}

			} else {
				# set error login message
				$this->session->set_flashdata('error', 'Username yang Anda masukkan tidak terdaftar!');
				redirect('autentikasi');
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('autentikasi');

		}
	}

	public function keluar()
	{
		if ($this->session->userdata('logged_in'))
			$this->session->unset_userdata('logged_in');

		$this->session->set_flashdata('success', "Anda telah log out dari Progress Tracker.");
		redirect('autentikasi');
	}

}
