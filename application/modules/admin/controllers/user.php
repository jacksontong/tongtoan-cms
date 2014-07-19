<?php 
class User extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Muser');
	}

	public function index()
	{
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
		$this->_data['loadPage'] = "user/index_view";
		$this->_data['mess'] = $this->session->flashdata('flash_mess');
		$this->load->view($this->_data['path'], $this->_data);
	}

	/**
	 * Action add new user
	 */
	public function add()
	{
		// Load helper and library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;

		// Set form validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|callback_check_user');
		$this->form_validation->set_rules('password', 'Password', 'matches[password2]|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');

		// Check rules
		if ($this->form_validation->run() == TRUE) {
			$data_insert = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level')
			];
			$this->Muser->insertUser($data_insert);
			$this->session->set_flashdata('flash_mess', 'Added');
			redirect(base_url().'admin/user/index');
		}

		// Load view
		$this->_data['titlePage']="Add A User";
		$this->_data['loadPage']="user/add_view";
		$this->load->view($this->_data['path'], $this->_data);
	}

	/**
	 * Call back function check username in database
	 */
	public function check_user($user)
	{
		if ($this->Muser->checkUserName($user) == FALSE) {
			$this->form_validation->set_message('check_user','Your username has been registed, please try again');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * Call back function check email in database
	 */
	public function check_email($email)
	{
		
		if ($this->Muser->checkEmail($email) == FALSE) {
			$this->form_validation->set_message('check_email','Your email has been registed, please try again');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/**
	 * Action delete user
	 */
	public function del()
	{
		$id = $this->uri->segment(4);
		$this->Muser->deleteUser($id);
		$this->session->set_flashdata('flash_mess', 'Deleted');
		redirect(site_url('admin/user/index'));
	}

}