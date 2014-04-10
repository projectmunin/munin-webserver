<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture_note extends MY_Controller {
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

		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('html');
	}
	
	public function index($id, $action = false)
	{
		if($action = "delete")
		{
			if($this->input->post('action') == 'delete')
			{
				$lecture_note = $this->Lecture_note_library->get_lecture_note($id);
				$lecture = $this->Lecture_note_library->get_lecture($lecture_note->lecture_id);
				
				$deleted = $this->Lecture_note_library->delete_lecture_note($id);
				if($deleted)
				{
					$this->session->set_flashdata('message',success_message_html('Lecture note deleted','Lecture note '.$id.' was successfully deleted.',true));
				}
				else
				{
					$this->session->set_flashdata('message',error_message_html('Error','Lecture note '.$id.' could not be deleted.',true));
				}
				redirect("admin/lecture/".$lecture->id, 'refresh');
			}
			else
			{
				$this->title = "Project Munin Admin - Delete lecture";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "lectures";
				
				$this->data['lecture_note'] = $this->Lecture_note_library->get_lecture_note($id);
				$this->data['lecture'] = $this->Lecture_note_library->get_lecture($this->data['lecture_note']->lecture_id);
	
				$this->_render("admin/lecture_note/delete");
			}
		}
	}
}