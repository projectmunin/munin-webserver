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
		$list_data = array
		(
			'lectures' => $lectures,
		);

		$lecture_list = $this->load->view("elements/lecture_list",$list_data,true);

		$latest_lectures = $this->load->view("elements/latest_lectures",array('lecture_list' => $lecture_list),true);

		$this->data = array
		(
			'content' => $latest_lectures,
			's' => '',
		);

		$this->title = "Project Munin";

		$this->_render("browse");
	}

	function search()
	{
		$this->data['title'] = "Login";

		$search = $this->input->get('s');

		$search_results = $this->Lecture_note_library->search_courses($search);

		$list_data = array
		(
			'courses' => $search_results,
		);

		$course_list = $this->load->view("elements/course_list",$list_data,true);

		$content = $this->load->view("elements/course_search_result",array(
			'course_list' => $course_list,
			'search' => $search,
			),true);
			
		if($this->input->is_ajax_request())
		{
			echo $content;
		}
		else
		{			
			$this->data = array
			(
				'content' => $content,
				's' => '',
			);
	
			$this->title = "Project Munin Search Results ".$search;
	
			$this->_render("browse");
		}
	}
}

/* End of file browse.php */
/* Location: ./application/controllers/browse.php */