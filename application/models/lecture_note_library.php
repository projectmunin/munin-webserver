<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture_note_library extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	/**
	 * Get latest notes
	 * @param int $count 
	 * @return array with latest notes
	 */
	function get_latest_notes($count = 10)
	{
		$this->db->select()->from('lecture_note')->limit($count)->order_by('time','desc');
		
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_courses()
	{
		//$this->db->select('name, period, code, count(lecture.id)')->from('course');
		$query = $this->db->query('
				SELECT name, period, code, COUNT( lecture.id ) recorded_lectures
				FROM course
				LEFT OUTER JOIN lecture ON course.period = lecture.course_period
				AND course.code = lecture.course_code
				GROUP BY period, code
			');
		//$query = $this->db->get();
		return $query->result();
	}

	function get_latest_lectures($count = 10)
	{
		/*
		$query = $this->db->query('
				SELECT finished, lecture.time AS time, course_code, course_period, lecture_hall_name, image
				FROM lecture
				LEFT OUTER JOIN lecture_note ON lecture.id = lecture_note.lecture_id
				GROUP BY lecture.id
				ORDER BY lecture.time, lecture_note.time DESC
				LIMIT ?
			',$count);
		return $query->result();
		*/
		//TODO might want to make this in one query
		$lectures = $this->db->select()->from('lecture')->get()->result();
		foreach ($lectures as $lecture) {
			$lecture->lecture_note = $this->db->select()->from('lecture_note')->where('lecture_id', $lecture->id)->order_by('time','desc')->get()->row();
			$lecture->course = $this->db->select()->from('course')->where('code', $lecture->course_code)->where('period', $lecture->course_period)->get()->row();
		}
		
		return $lectures;
	}

	function get_lectures($course_code, $course_period)
	{
		$this->db->select()->from('lecture')->where('course_code', $course_code)->where('course_period', $course_period);
		
		$query = $this->db->get();
		return $query->result();
	}

	function get_course($course_code, $course_period)
	{
		$this->db->select()->from('course')->where('code', $course_code)->where('period', $course_period);
		
		$query = $this->db->get();
		return $query->row();//returns only the first row
	}
}

/* End of file lecture_note_library.php */
/* Location: ./application/model/lecture_note_library.php */