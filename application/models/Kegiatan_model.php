<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Kegiatan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_kegiatan($data)
	{
		$result = $this->db->insert('kegiatan', $data);

		return $this->db->insert_id();
	}


	public function get_all_kegiatan()
	{
		$this->db->where('milestone', 0);
		$this->db->order_by('waktu_mulai', 'asc');
		return $this->db->get('kegiatan')->result_array();
	}

	public function get_kegiatan_by_id($id)
	{
		$this->db->from('kegiatan');
		$this->db->where('id', $id);

		return $this->db->get()->row_array();
	}

	public function get_kegiatan_in_proyek($id_proyek)
	{
		$this->db->from('kegiatan');
		$this->db->where('id_proyek', $id_proyek);
		$this->db->order_by('waktu_mulai', 'asc');
		return $this->db->get()->result_array();
	}

	public function get_all_milestone()
	{
		$this->db->where('milestone', 1);
		$this->db->order_by('waktu_mulai', 'asc');
		return $this->db->get('kegiatan')->result_array();
	}
}


?>