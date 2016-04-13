<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Channel_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_channel($data)
	{
		$result = $this->db->insert('channel', $data);

		return $this->db->insert_id();
	}


	public function get_all_channel_on_proyek($id_proyek)
	{
		$this->db->where('id_proyek', $id_proyek);
		return $this->db->get('channel')->result_array();
	}

	public function get_channel_by_id($id)
	{
		$this->db->from('channel');
		$this->db->where('id', $id);
		
		return $this->db->get()->row_array();
	}

}


?>