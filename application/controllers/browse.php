<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('pretty_date');
		$this->lang->load('home');
	}

	public function index()
	{
		$lectures = $this->Lecture_note_library->get_latest_lectures();
		$this->data = array
		(
			'lectures' => $lectures,
		);

		$this->title = "Project Munin";

		$this->_render("browse");
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */