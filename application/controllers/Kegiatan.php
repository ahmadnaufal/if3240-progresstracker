<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kegiatan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kegiatan_model', 'kegiatan');
	}

	public function index($id_proyek)
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$kegiatan_data['daftar_kegiatan'] = $this->kegiatan->get_kegiatan_in_proyek($id_proyek);
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('kegiatan/daftar.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function formAddKegiatan()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('kegiatan/form-modal.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function addKegiatan()
	{
		$this->form_validation->set_rules('nama', 'Nama Kegiatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required|xss_clean');
		$this->form_validation->set_rules('waktu_selesai', 'Waktu Selesai', 'required|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Kegiatan', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$kegiatan_data['nama_kegiatan'] = $this->input->post("nama");
			$kegiatan_data['waktu_mulai'] = date('Y-m-d H:i:s', strtotime($this->input->post("waktu_mulai")));
			$kegiatan_data['waktu_selesai'] = date('Y-m-d H:i:s', strtotime($this->input->post("waktu_selesai")));
			$kegiatan_data['deskripsi'] = $this->input->post("deskripsi");
			$kegiatan_data['milestone'] = $this->input->post("milestone");
			$kegiatan_data['id_proyek'] = $this->input->post("id_proyek");

			if ($result = $this->kegiatan->insert_new_kegiatan($kegiatan_data)) {
				$this->session->set_flashdata('success', "Pembuatan Kegiatan berhasil!");
				redirect('proyek/' . $kegiatan_data['id_proyek']);
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/' . $kegiatan_data['id_proyek']);
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('proyek/' . $kegiatan_data['id_proyek']);

		}
	}


}