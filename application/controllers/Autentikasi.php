<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	This is the Auth controller.
 */
class Autentikasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_model', 'pengguna');
	}

	public function index()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			if ($userdata['tipe'] == 0) {
				$this->load->model('proyek_model');

				$proyek = $this->proyek_model->get_proyek_by_client($userdata['username']);
				if ($proyek)
					redirect('proyek/detail-proyek/'.$proyek['id']);
				else {
					$this->session->unset_userdata('logged_in');
					redirect('autentikasi');
				}

			} else {
				redirect('proyek/daftar-proyek');
			}
		} else {
			$this->load->view('templates/html.php');
			$this->load->view('contents/login.php');
			$this->load->view('templates/footer.php');
		}
	}

	public function masuk()
	{
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
