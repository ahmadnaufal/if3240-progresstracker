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
		$this->form_validation->set_rules('email', 'E-mail Klien', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$proyek_data['nama_proyek'] = $this->input->post("nama_proyek");
			$proyek_data['deskripsi'] = $this->input->post("deskripsi");
			$email = $this->input->post("email");

			if ($proyek_data['username_klien'] = $this->addPenggunaKlien($email)) {

				if ($result_id = $this->proyek->insert_new_proyek($proyek_data)) {
					$this->session->set_flashdata('success', "Pembuatan Proyek Berhasil. Selamat datang di halaman overview Proyek Anda!");
					redirect('proyek/getProyek/'.$result_id);
				} else {
					$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
					redirect('proyek/formAddProyek');
				}

			} else {
				# set error login message
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/formAddProyek');
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('proyek/formAddProyek');

		}
	}

	/*** NO REDIRECT METHODS ***/
	public function addPenggunaKlien($email)
	{
		$this->load->model('pengguna_model');

		$pengguna_data['username'] = substr($email, 0, strpos($email, '@'));
		$pengguna_data['password'] = hash('sha512', $pengguna_data['username']);
		$pengguna_data['email'] = $email;

		if ($this->pengguna_model->insert_new_pengguna($pengguna_data)) {
			return $pengguna_data['username'];
		} else {
			return NULL;
		}
	}

}
