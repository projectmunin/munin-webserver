<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct()
	{
		parent::__construct(true,true);
		
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		
		
		$this->load->helper('html');
	}
	
	public function index()
	{
		$this->title = "Project Munin - User list";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "users";

		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
		$this->data['users'] = $this->ion_auth->users()->result();
		$this->data['current_user'] = $this->ion_auth->user()->row();
		
		foreach ($this->data['users'] as $k => $user)
		{
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		
		$this->_render("admin/users");
	}
	
	public function add()
	{
		$this->title = "Project Munin - Add new user";
		$this->template = "admin";
		$this->navbar = "navbar_admin";
		$this->nav_active = "users";
		
		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("admin/users", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render("admin/users/add");
		}
	}
	
		//edit a user
	function edit($id, $action = false)
	{
		if(!$action)
		{
			$this->title = "Project Munin - Edit user";
			$this->template = "admin";
			$this->navbar = "navbar_admin";
			$this->nav_active = "users";
	
			$user = $this->ion_auth->user($id)->row();
			$groups=$this->ion_auth->groups()->result_array();
			$currentGroups = $this->ion_auth->get_users_groups($id)->result();
	
			//validate form input
			$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');
	
			if (isset($_POST) && !empty($_POST))
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}
	
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
				);
	
				//Update the groups user belongs to
				$groupData = $this->input->post('groups');
	
				if (isset($groupData) && !empty($groupData)) {
	
					$this->ion_auth->remove_from_group('', $id);
	
					foreach ($groupData as $grp) {
						$this->ion_auth->add_to_group($grp, $id);
					}
	
				}
	
				//update the password if it was posted
				if ($this->input->post('password'))
				{
					$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
					$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
	
					$data['password'] = $this->input->post('password');
				}
	
				if ($this->form_validation->run() === TRUE)
				{
					$this->ion_auth->update($user->id, $data);
	
					//check to see if we are creating the user
					//redirect them back to the admin page
					$this->session->set_flashdata('message', "User Saved");
					if ($this->ion_auth->is_admin())
					{
						redirect('admin/users', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
				}
			}
	
			//display the edit user form
			$this->data['csrf'] = $this->_get_csrf_nonce();
	
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
	
			//pass the user to the view
			$this->data['user'] = $user;
			$this->data['groups'] = $groups;
			$this->data['currentGroups'] = $currentGroups;
	
			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name', $user->first_name),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name', $user->last_name),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id'   => 'password',
				'type' => 'password'
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id'   => 'password_confirm',
				'type' => 'password'
			);
	
			$this->_render("admin/users/edit");
		}
		else if($action = "delete")
		{
			if($this->input->post('action') == 'delete')
			{
				$deleted = $this->ion_auth->delete_user($id);
				if($deleted)
				{
					$this->session->set_flashdata('message',success_message_html('User deleted','User '.$id.' was successfully deleted.',true));
				}
				else
				{
					$this->session->set_flashdata('message',error_message_html('Error','User '.$id.' could not be deleted.',true));
				}
				redirect("admin/users", 'refresh');
			}
			else
			{
				$this->title = "Project Munin Admin - Delete course";
				$this->template = "admin";
				$this->navbar = "navbar_admin";
				$this->nav_active = "users";
				
				$this->data['user'] = $this->ion_auth->user($id)->row();
	
				$this->_render("admin/users/delete");
			}
		}
	}
	
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


}