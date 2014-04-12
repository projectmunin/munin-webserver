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
		$this->data['lectures_count'] = $this->Lecture_note_library->get_all_lectures_count();
		$this->data['lecture_notes_count'] = $this->Lecture_note_library->get_all_lecture_notes_count();

		$this->_render("admin");
	}
}