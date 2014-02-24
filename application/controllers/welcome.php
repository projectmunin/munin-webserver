<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Lecture_note_library', '', true);


		$this->load->helper('url');
		$this->load->helper('language');

		$this->lang->load('home');

		$navbar = $this->load->view('elements/navbar',array(),true);

		$lecture_notes = $this->Lecture_note_library->get_latest_notes();
		$content_args = array
		(
			'lecture_notes' => $lecture_notes,
		);
		$content = $this->load->view('home',$content_args,true);

		$template_args = array
		(
			'title' => "Project Munin",
			'navbar' => $navbar,
			'content' => $content,
		);

		$this->load->view('templates/base',$template_args);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */