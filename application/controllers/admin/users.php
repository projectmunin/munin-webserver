<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->lang->load('auth');
	}
	
	public function index()
	{
		$this->title = "Project Munin - Admin";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "admin";

		$this->data['users'] = $this->ion_auth->users()->result();

		$this->_render_admin("admin/users");
	}

}