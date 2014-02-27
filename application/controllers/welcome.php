<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('url');
		$this->load->helper('language');
		$this->lang->load('home');
	}

	public function index()
	{
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