<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
		
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('html');
	}
	
	public function index($id, $action = false)
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
		else if(!$action)
		{
			$this->title = "Project Munin - Admin";
			$this->template = "admin";
			$this->navbar = "navbar_admin";
			$this->nav_active = "courses";

			$this->load->helper('pretty_date');
			$this->data['lecture'] = $this->Lecture_note_library->get_lecture($id);
			$this->data['lecture_notes'] = $this->Lecture_note_library->get_lecture_notes($id);
			$this->data['message'] = $this->session->flashdata('message');

			$this->_render("admin/lecture");
		}
		else if($action = "delete")
		{
			if($this->input->post('action') == 'delete')
			{
				$lecture = $this->Lecture_note_library->get_lecture($id);
				$deleted = $this->Lecture_note_library->delete_lecture($id);
				if($deleted)
				{
					$this->session->set_flashdata('message',success_message_html('Lecture deleted','Lecture '.$id.' was successfully deleted.',true));
				}
				else
				{
					$this->session->set_flashdata('message',error_message_html('Error','Lecture '.$id.' could not be deleted.',true));
				}
				redirect("admin/courses/".$lecture->course->code."/".$lecture->course->period, 'refresh');
			}
			else
			{
				$this->title = "Project Munin Admin - Delete lecture";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "lectures";
				
				$this->data['lecture'] = $this->Lecture_note_library->get_lecture($id);
	
				$this->_render("admin/lecture/delete");
			}
		}
	}
}