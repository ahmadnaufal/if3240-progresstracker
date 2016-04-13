<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Channel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Channel_model', 'channel');
		$this->load->model('Pesan_model', 'pesan');
	}

	public function index($id)
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			$channel_data['daftar_channel'] = $this->channel->get_all_channel_on_proyek($id)
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('channel/daftar.php', $channel_data);
			$this->load->view('templates/footer.php');
		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function getChannel($id)
	{
		if ($userdata = $this->session->userdata('logged_in')) {
			$channel_data['channel'] = $this->channel->get_channel_by_id($id);
			$channel_data['daftar_pesan'] = $this->pesan->get_pesan_on_channel($id);
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('channel/detail.php', $channel_data);
			$this->load->view('templates/footer.php');
		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function formAddChannel()
	{
		if ($userdata = $this->session->userdata('logged_in')) {
		
			$data['userdata'] = $userdata;

			$this->load->view('templates/html.php');
			$this->load->view('templates/header.php', $data);
			$this->load->view('channel/form.php');
			$this->load->view('templates/footer.php');

		} else {
			$this->session->set_flashdata('error', "Anda harus masuk terlebih dahulu.");
			redirect('autentikasi');
		}
	}

	public function addChannel()
	{
		$this->form_validation->set_rules('nama_channel', 'Nama Proyek', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			$channel_data['nama_channel'] = $this->input->post("nama_channel");
			$channel_data['id_proyek'] = $this->input->post("id_proyek");

			if ($result_id = $this->channel->insert_new_channel($channel_data)) {
				$this->session->set_flashdata('success', "Pembuatan Channel berhasil!");
				redirect('channel/getChannel/'.$result_id);
			} else {
				$this->session->set_flashdata('error', "Database error. Silakan ulang beberapa saat lagi.");
				redirect('channel/formAddChannel');
			}

		} else {

			$this->session->set_flashdata('error', validation_errors());
			redirect('channel/formAddChannel');

		}
	}

}
