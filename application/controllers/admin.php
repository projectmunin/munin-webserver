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
			redirect('auth/login?return_to=admin', 'refresh');
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
			$this->nav_active = "admin";

			$this->load->model('Lecture_note_library', '', true);
			$this->data['courses_count'] = $this->Lecture_note_library->get_all_courses_count();
			$this->data['lectures_count'] = $this->Lecture_note_library->get_all_lectures_count();
			$this->data['lecture_notes_count'] = $this->Lecture_note_library->get_all_lecture_notes_count();

			$this->_render("admin");
		}
	}
	
	public function courses($code = false, $period = false, $lecture_id = false)
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
			if(!$code || !$period)
			{
				$this->title = "Project Munin Admin - Courses";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "courses";
	
				$this->load->model('Lecture_note_library', '', true);
				$this->data['courses'] = $this->Lecture_note_library->get_all_courses();
	
				$this->_render("admin/course_list");
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
	
				$this->_render("admin/course");
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
	
				$this->_render("admin/lecture");
			}
		}
	}
	
	public function lecture($id)
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
	
	public function cameras($camera_unit_name = false)
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
			$this->title = "Project Munin - Cameras";
			$this->template = "admin";
			$this->navbar = "navbar_admin";
			$this->nav_active = "cameras";

			$this->load->model('Lecture_note_library', '', true);
			
			if(!$camera_unit_name)
			{
				$this->data['camera_units'] = $this->Lecture_note_library->get_all_camera_units();
				$this->_render("admin/camera_list");
			}
			else
			{
				if($this->input->post())
				{
					exec("export DYLD_LIBRARY_PATH=''; cd external_services; java -Djava.awt.headless=true CamConfig",$echo,$code);
					echo json_encode(array('exit_code' => $code));
				}
				else
				{
					$this->data['message'] = (string)$this->input->get('message');
					$this->data['camera_unit'] = $this->Lecture_note_library->get_camera_unit($camera_unit_name);
					$this->_render("admin/camera_configure");
				}
			}
		}
	}
}