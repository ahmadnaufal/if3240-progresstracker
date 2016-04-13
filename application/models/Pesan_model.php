<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Pesan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_pesan($data)
	{
		$result = $this->db->insert('pesan', $data);

		return $this->db->insert_id();
	}


	public function get_all_pesan_on_channel($id_channel)
	{
		$this->db->where('id_channel', $id_channel);
		return $this->db->get('pesan')->result_array();
	}

	public function get_pesan_by_id($id)
	{
		$this->db->from('pesan');
		$this->db->where('id', $id);
		
		return $this->db->get()->row_array();
	}

	public function get_pesan_by_pengguna($username_pengguna)
	{
		$this->db->from('pesan');
		$this->db->where('username_pengguna', $username_pengguna);
		
		return $this->db->get()->result_array();
	}

}


?>