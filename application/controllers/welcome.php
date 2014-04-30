<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('url');
		$this->load->helper('language');
	}

	public function index()
	{
		$lecture_notes = $this->Lecture_note_library->get_latest_notes();
		$this->data = array
		(
			'lecture_notes' => $lecture_notes,
		);

		$this->title = "Project Munin";

		$this->_render("home");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */