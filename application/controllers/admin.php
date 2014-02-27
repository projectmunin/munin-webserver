<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->lang->load('auth');
	}
	
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$navbar = $this->load->view('elements/navbar',array(),true);

			$content_args = array
			(
			);
			$content = $this->load->view('admin',$content_args,true);

			$template_args = array
			(
				'title' => "Project Munin - Admin",
				'navbar' => $navbar,
				'content' => $content,
			);

			$this->load->view('templates/base',$template_args);
		}
	}
}