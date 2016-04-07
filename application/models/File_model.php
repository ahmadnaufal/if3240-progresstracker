<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class File_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_file($data)
	{
		$result = $this->db->insert('file', $data);

		return $this->db->insert_id();
	}


	public function get_all_file_on_kegiatan($id_kegiatan)
	{
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->order_by('waktu_upload', 'desc');
		return $this->db->get('file')->result_array();
	}

	public function get_file_by_id($id)
	{
		$this->db->from('file');
		$this->db->where('id', $id);
		$this->db->order_by('waktu_upload', 'desc');
		
		return $this->db->get()->result_array();
	}

}


?>