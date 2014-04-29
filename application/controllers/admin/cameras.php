<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cameras extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
		
		$this->load->model('Lecture_note_library', '', true);
		
		$this->load->helper('html');
	}
	
	public function index($camera_unit_name = false, $action = false)
	{
		$this->title = "Project Munin - Cameras";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "cameras";

		
		
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
						$command = "export DYLD_LIBRARY_PATH=''; cd external_services; java -cp .:mysql-connector-java-5.0.8-bin.jar -Djava.awt.headless=true NetworkServerSendConfigs -r ".escapeshellarg($this->input->post("name"))." -d -l ".escapeshellarg($this->input->post("location"));
						
						if($this->input->post("server_password"))
						{
							$command .= " -p ".escapeshellarg($this->input->post("server_password"));
							
							log_message('debug', 'Running command: '.$command);
							exec($command,$echo,$code);
						}
						else
						{
							log_message('debug', 'Running command: '.$command);
							exec($command,$echo,$code);
						}
						log_message('debug', 'Echo: '.var_export($echo,true));
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
				$this->data['message'] = '';
				if($this->input->get('message') == '0')
				{
					$this->data['message'] = success_message_html("Success",lang('admin_camera_config_update_'.$this->input->get('message')),true);
				}
				elseif($this->input->get('message') != '')
				{
					$this->data['message'] = error_message_html("Error",lang('admin_camera_config_update_'.$this->input->get('message')),true);
				}
				$this->data['camera_unit'] = $this->Lecture_note_library->get_camera_unit($camera_unit_name);
				$this->_render("admin/camera_configure");
			}
		}
	}

}