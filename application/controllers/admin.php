<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
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
			$this->title = "Project Munin - Admin";
			$this->template = "admin";

			$this->load->model('Lecture_note_library', '', true);
			$this->data['courses'] = $this->Lecture_note_library->get_all_courses();

			$this->_render("admin");
		}
	}

	public function courses($code, $period, $show)
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
			$this->title = "Project Munin - Admin";
			$this->template = "admin";

			$this->load->model('Lecture_note_library', '', true);
			$this->data['lectures'] = $this->Lecture_note_library->get_lectures($code,$period);

			$this->_render("admin");
		}
	}
}