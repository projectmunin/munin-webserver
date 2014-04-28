<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cameras extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
	}
	
	public function index($camera_unit_name = false, $action = false)
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
			//AJAX actions
			if($action)
			{
				if($action == "set_config")
				{
					if($this->input->post())
					{
						$command = "export DYLD_LIBRARY_PATH=''; cd external_services; java -cp .:mysql-connector-java-5.0.8-bin.jar -Djava.awt.headless=true NetworkServerSendConfigs -r ".$this->input->post("name")." -l ".$this->input->post("location");
						
						if($this->input->post("server_password"))
						{
							$command .= " -p ".$this->input->post("server_password");
							
							log_message('debug', 'Running command: '.$command);
							exec($command,$echo,$code);
						}
						else
						{
							log_message('debug', 'Running command: '.$command);
							exec($command,$echo,$code);
						}
						log_message('debug', 'Echo: '.$echo);
						log_message('debug', 'Exit code: '.$code);
						echo json_encode(array('exit_code' => $code));
					}
				}
				if($action == "get_status")
				{
					$this->load->helper('network');
					$camera_unit = $this->Lecture_note_library->get_camera_unit($camera_unit_name);
					
					$ping_status = ping($camera_unit->ip_address,2,5);
					
					echo json_encode(array('online' => $ping_status));
				}
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