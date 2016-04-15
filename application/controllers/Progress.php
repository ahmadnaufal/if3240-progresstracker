<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Progress extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Progress_model', 'progress');
	}

	public function addProgress($id_kegiatan)
	{
		$this->form_validation->set_rules('persentase', 'Persentase', 'required|xss_clean');

		if ($this->form_validation->run()) {

			$progress_data['id_kegiatan'] = $this->input->post("id_kegiatan");
			$progress_data['persentase'] = $this->input->post("persentase");
			$progress_data['username_pengguna'] = $this->input->post("username");

			if ($result = $this->progress->insert_new_progress($progress_data)) {
				$this->session->set_flashdata('success', "Penambahan Progress berhasil!");
				redirect('proyek/'.$this->input->post("id_proyek"));
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/'.$this->input->post("id_proyek"));
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('proyek/'.$this->input->post("id_proyek"));

		}
	}

}