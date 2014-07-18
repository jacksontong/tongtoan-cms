<?php 
class User extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();

	}

	public function index()
	{
		$this->load->model('Muser');

		// Pagination
		$config['base_url'] = base_url().'admin/user/index/';
		$config['total_rows'] = $this->Muser->countAll();
		$config['per_page'] = 3; 
		$config['uri_segment'] = 4;
		$this->load->library('pagination', $config);
		$this->_data['page_link']=$this->pagination->create_links();

		// Fetch all users
		$start=$this->uri->segment(4);
		$this->_data['info']=$this->Muser->listAllUser($config['per_page'],$start);

		// Load view
		$this->_data['titlePage'] = "List All User";
		$this->_data['loadPage']="user/index_view";
		$this->load->view($this->_data['path'], $this->_data);
	}

}