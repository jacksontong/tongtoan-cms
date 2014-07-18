<?php 
class User extends AdminController 
{
	function __construct() 
	{
		parent::__construct();

	}

	public function index()
	{
		$this->_data['titlePage'] = "List All User";
		$this->_data['loadPage']="user/index_view";
		$this->load->view($this->_data['path'], $this->_data);
	}
}