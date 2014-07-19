<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {
	protected $_table="user";
	function __construct() 
	{
		parent::__construct();
	}

	/**
	 * List all user from $_table
	 */
	public function listAllUser($all,$start)
	{
		$this->db->limit($all,$start);
		return $this->db->get($this->_table)->result_array();
	}

	/**
	 * Count All record form $_table
	 */
	public function countAll()
	{
		return $this->db->count_all($this->_table);
	}

	/**
	 * Check user when add new user
	 */
	public function checkUserName($user)
	{
		$this->db->where('username', $user);
		$query = $this->db->get($this->_table);
		if ($query->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * Check email when add new user
	 */
	public function checkEmail($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get($this->_table);
		if ($query->num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * Insert new user
	 */
	public function insertUser($data_insert)
	{
		$this->db->insert($this->_table, $data_insert);
	}

	/**
	 * Delete user
	 */
	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->_table);
	}
}

/* End of file muser.php */
/* Location: ./application/models/muser.php */