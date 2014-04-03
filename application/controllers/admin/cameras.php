<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cameras extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index($camera_unit_name = false)
	{
		$this->title = "Project Munin - Cameras";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "cameras";

		$this->load->model('Lecture_note_library', '', true);
		
		if(!$camera_unit_name)
		{
			$this->data['camera_units'] = $this->Lecture_note_library->get_all_camera_units();
			$this->_render_admin("admin/camera_list");
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
				$this->_render_admin("admin/camera_configure");
			}
		}
	}

}