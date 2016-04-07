<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Proyek_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_proyek($data)
	{
		$result = $this->db->insert('proyek', $data);

		return $this->db->insert_id();
	}


	public function get_all_proyek()
	{
		return $this->db->get('proyek')->result_array();
	}

	public function get_proyek_by_id($id)
	{
		$this->db->from('proyek');
		$this->db->where('id', $id);

		return $this->db->get()->row_array();
	}

	public function get_proyek_by_client($username_pengguna)
	{
		$this->db->from('proyek');
		$this->db->where('username_pengguna', $username_pengguna);

		return $this->db->get()->row_array();
	}

}


?>