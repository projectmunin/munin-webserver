<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Lecture_note_library', '', true);
		$this->load->helper('url');
		$this->load->helper('language');
		$this->load->helper('pretty_date');
	}

	public function index($code = FALSE, $period = FALSE)
	{
		$course = $this->Lecture_note_library->get_course($code,$period);

		if(!$course)
		{
			return show_error('Could not get info for course with code '.$code.' and period'.$period);
		}

		$lectures = $this->Lecture_note_library->get_lectures($code,$period);
		$periods = $this->Lecture_note_library->get_course_periods($code);

		$list_data = array
		(
			'lectures' => $lectures,
		);
		$lecture_list = $this->load->view("elements/lecture_list",$list_data,true);

		$this->data = array
		(
			'course' => $course,
			'periods' => $periods,
			'lecture_list' => $lecture_list,
		);

		$this->title = "Project Munin Course".$course->name;

		$this->_render("course");
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */