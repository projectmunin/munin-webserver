<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
	}
	
	public function index()
	{
		$this->title = "Project Munin - Admin";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "admin";

		$this->load->model('Lecture_note_library', '', true);
		$this->data['courses_count'] = $this->Lecture_note_library->get_all_courses_count();
		$this->data['camera_units_count'] = $this->Lecture_note_library->get_all_camera_units_count();
		$this->data['users_count'] = count($this->ion_auth->users()->result());

		$this->_render("admin");
	}
}