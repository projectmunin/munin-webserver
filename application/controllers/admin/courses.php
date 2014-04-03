<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index($code = false, $period = false, $lecture_id = false)
	{
			if(!$code || !$period)
			{
				$this->title = "Project Munin Admin - Courses";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->load->model('Lecture_note_library', '', true);
				$this->data['courses'] = $this->Lecture_note_library->get_all_courses();
	
				$this->_render_admin("admin/course_list");
			}
			else if(!$lecture_id)
			{
				$this->title = "Project Munin - Admin";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->load->model('Lecture_note_library', '', true);
				$this->data['course'] = $this->Lecture_note_library->get_course($code,$period);
				$this->data['lectures'] = $this->Lecture_note_library->get_lectures($code,$period);
	
				$this->_render_admin("admin/course");
			}
			else
			{
				$this->title = "Project Munin - Admin";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->load->model('Lecture_note_library', '', true);
				$this->load->helper('pretty_date');
				$this->data['course'] = $this->Lecture_note_library->get_course($code,$period);
				$this->data['lecture'] = $this->Lecture_note_library->get_lecture($lecture_id);
				$this->data['lecture_notes'] = $this->Lecture_note_library->get_lecture_notes($lecture_id);
	
				$this->_render_admin("admin/lecture");
			}
	}
}