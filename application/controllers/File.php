<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('File_model', 'file');
	}

	public function addFile($id_proyek)
	{
		$file_data['id_kegiatan'] = $this->input->post('id_kegiatan');
		// validate configuration of image uploader
		$config['upload_path'] = './uploads/proyek/'.$id_proyek.'/kegiatan/'.$file_data['id_kegiatan'];
		$config['allowed_types'] = '*';

		if (!is_dir($config['upload_path']))
			mkdir($config['upload_path'], 0777, TRUE);

		$config['upload_path'] .= '/';
		$config['overwrite']  = FALSE;

		// load the library and initialize it with the config attribute
		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('proyek/'.$id_proyek);
		} else {
			$file_data['nama_file'] = $this->upload->data()['file_name'];

			if ($result_id = $this->file->insert_new_file($file_data)) {
				$this->session->set_flashdata('success', "File berhasil diunggah ke kegiatan!");
				redirect('proyek/'.$id_proyek);
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('proyek/' . $id_proyek);
			}
		}
	}

}
