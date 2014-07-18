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
}

/* End of file muser.php */
/* Location: ./application/models/muser.php */