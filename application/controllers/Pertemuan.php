<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pertemuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pertemuan_model', 'pertemuan');
	}

	public function index($id_proyek)
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$pertemuan_data['daftar_pertemuan'] = $this->pertemuan->get_all_pertemuan_on_proyek($id_proyek);
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pertemuan/daftar.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function formAddPertemuan()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('pertemuan/form.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function addPertemuan()
	{
		$this->form_validation->set_rules('judul', 'Judul Pertemuan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('waktu', 'Waktu Pertemuan', 'required|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Pertemuan', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$pertemuan_data['judul'] = $this->input->post("judul");
			$pertemuan_data['waktu'] = date('Y-m-d H:i:s', strtotime($this->input->post("waktu")));
			$pertemuan_data['deskripsi'] = $this->input->post("deskripsi");
			$pertemuan_data['id_proyek'] = $this->input->post("id_proyek");

			if ($result = $this->pertemuan->insert_new_pertemuan($pertemuan_data)) {
				$this->session->set_flashdata('success', "Pembuatan Pertemuan berhasil!");
				redirect('proyek/' . $pertemuan_data['id_proyek']);
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/' . $pertemuan_data['id_proyek']);
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('proyek/' . $pertemuan_data['id_proyek']);

		}
	}

}
