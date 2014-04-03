<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login?return_to=admin', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}

	}
	
	public function index($id)
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
			$this->navbar = "navbar_admin";
			$this->nav_active = "courses";

			$this->load->model('Lecture_note_library', '', true);
			$this->load->helper('pretty_date');
			$this->data['lecture'] = $this->Lecture_note_library->get_lecture($id);
			$this->data['lecture_notes'] = $this->Lecture_note_library->get_lecture_notes($id);

			$this->_render("admin/lecture");
		}
	}
}