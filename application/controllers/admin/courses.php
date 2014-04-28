<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
		
		$this->load->model('Lecture_note_library', '', true);
		
		$this->load->helper('html');

	}
	
	public function index($code = false, $period = false, $action = false)
	{
			if(!$code || !$period)
			{
				$this->title = "Project Munin Admin - Courses";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->data['courses'] = $this->Lecture_note_library->get_all_courses();
				$this->data['message'] = $this->session->flashdata('message');
	
				$this->_render("admin/course_list");
			}
			else if(!$action)
			{
			
				$this->title = "Project Munin - Admin";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->data['course'] = $this->Lecture_note_library->get_course($code,$period);
				$this->data['lectures'] = $this->Lecture_note_library->get_lectures($code,$period);
				$this->data['message'] = $this->session->flashdata('message');
	
				$this->_render("admin/course");
			}
			else if($action = "delete")
			{
				if($this->input->post('action') == 'delete')
				{
					$deleted = $this->Lecture_note_library->delete_course($code,$period);
					if($deleted)
					{
						$this->session->set_flashdata('message',success_message_html('Course deleted','Course '.$code.' '.$period.' was successfully deleted.',true));
					}
					else
					{
						$this->session->set_flashdata('message',error_message_html('Error','Course '.$code.' '.$period.' could not be deleted.',true));
					}
					redirect("admin/courses", 'refresh');
				}
				else
				{
					$this->title = "Project Munin Admin - Delete course";
					$this->template = "admin";
					$this->navbar = "navbar_admin";
					$this->nav_active = "courses";
					
					$this->data['course'] = $this->Lecture_note_library->get_course($code,$period);

					$this->_render("admin/course/delete");
				}
			}
	}
}