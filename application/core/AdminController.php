<?php 
class AdminController extends MY_Controller 
{
	protected $_data;
	public function __construct()
	{
		parent::__construct();
		$mod = $this->uri->segment(1);
		$this->_data['module'] = $mod;
		$this->_data['path'] = "$mod/template";
	}
}