<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Progress_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_progress($data)
	{
		$result = $this->db->insert('progress', $data);

		return $result;
	}


	public function get_all_progress_on_kegiatan($id_kegiatan)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get('progress')->result_array();
	}

	public function get_all_progress_on_kegiatan_by_pengguna($id_kegiatan, $username_pengguna)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->where('username_pengguna', $username_pengguna);
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get('progress')->result_array();
	}

	public function get_all_progress_by_pengguna($username_pengguna)
	{
		$this->db->from('progress');
		$this->db->where('username_pengguna', $username_pengguna);
		$this->db->order_by('timestamp', 'desc');
		return $this->db->get()->result_array();
	}

}


?>