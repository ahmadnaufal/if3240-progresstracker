<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Pertemuan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_pertemuan($data)
	{
		$result = $this->db->insert('pertemuan', $data);

		return $result();
	}


	public function get_all_pertemuan_on_proyek($id_proyek)
	{
		$this->db->where('id_proyek', $id_proyek);
		$this->db->order_by('waktu', 'desc');
		return $this->db->get('pertemuan')->result_array();
	}

	public function get_pertemuan_on_waktu($waktu)
	{
		$this->db->from('pertemuan');
		$this->db->where('waktu', $waktu);
		
		return $this->db->get()->result_array();
	}

}


?>