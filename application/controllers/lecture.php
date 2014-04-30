<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('pretty_date');
	}

	public function index($id = FALSE)
	{
		if(!$id)
		{
			return show_error('No id provided.');
		}

		$lecture = $this->Lecture_note_library->get_lecture($id);
		$lecture_notes = $this->Lecture_note_library->get_lecture_notes($id);

		$this->data = array
		(
			'lecture' => $lecture,
			'lecture_notes' => $lecture_notes,
		);

		$this->title = "Project Munin Lecture";

		$this->_render("lecture");
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */