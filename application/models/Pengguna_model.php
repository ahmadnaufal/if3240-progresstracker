<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	

class Pengguna_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_new_pengguna($data, $tipe = 0)
	{
		$data['tipe'] = 0;
		$result = $this->db->insert('pengguna', $data);

		return $result;
	}


	public function get_all_pengguna()
	{
		return $this->db->get('pengguna')->result_array();
	}

	public function get_pengguna_by_email($email)
	{
		$this->db->from('pengguna');
		$this->db->where('email', $email);

		return $this->db->get()->row_array();
	}

	public function get_pengguna_in_tipe($tipe)
	{
		$this->db->from('pengguna');
		$this->db->where('tipe', $tipe);

		return $this->db->get()->result_array();
	}

	public function get_pengguna_by_username($username)
	{
		$this->db->from('pengguna');
		$this->db->where('username', $username);

		return $this->db->get()->row_array();
	}

	public function update_pengguna_data($username, $data)
	{
		$this->db->where('username', $username);
		$result = $this->db->update('pengguna', $data);

		return $this->db->affected_rows();
	}

	public function update_pengguna_data_by_email($email, $data)
	{
		$this->db->where('email', $email);
		$result = $this->db->update('pengguna', $data);

		return $this->db->affected_rows();
	}

	public function delete_pengguna($username)
	{
		$this->db->from('pengguna');
		$this->db->where('username', $username);
		$this->db->delete();

		return $this->db->affected_rows();
	}

	public function delete_pengguna_by_email($email)
	{
		$this->db->from('pengguna');
		$this->db->where('email', $email);
		$this->db->delete();

		return $this->db->affected_rows();
	}

}


?>