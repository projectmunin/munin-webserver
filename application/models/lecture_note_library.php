<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture_note_library extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	/*****************************
	* Courses
	********************************************/
	
	function get_all_courses()
	{
		//$this->db->select('name, period, code, count(lecture.id)')->from('course');
		$query = $this->db->query('
				SELECT name, period, code, COUNT( lectures.id ) recorded_lectures
				FROM courses
				LEFT OUTER JOIN lectures ON courses.period = lectures.course_period
				AND courses.code = lectures.course_code
				GROUP BY period, code
			');
		//$query = $this->db->get();
		return $query->result();
	}
	
	function get_all_courses_count()
	{
		//$this->db->select('name, period, code, count(lecture.id)')->from('course');
		$query = $this->db->query('
				SELECT COUNT(*) AS count
				FROM courses
				GROUP BY code
			');
		//$query = $this->db->get();
		return $query->row()->count;
	}

	function search_courses($search)
	{
		//This is a weird query but its to be able to get the latest period in the period column
		$query = $this->db->query('
				SELECT name,period AS latest_period,code,SUM(recorded_lectures) recorded_lectures FROM 
				(
					SELECT name, period, code, COUNT( lectures.id ) recorded_lectures
					FROM courses
					LEFT OUTER JOIN lectures ON courses.period = lectures.course_period
					AND courses.code = lectures.course_code
					WHERE name LIKE ? OR code LIKE ?
					GROUP BY code, period
					ORDER BY period DESC
				) derp
				GROUP BY code
			',array('%'.$search.'%','%'.$search.'%'));
		return $query->result();
	}
	
	function get_course($course_code, $course_period)
	{
		$this->db->select()->from('courses')->where('code', $course_code)->where('period', $course_period);
		
		$query = $this->db->get();
		return $query->row();//returns only the first row
	}
	
	function get_course_periods($course_code)
	{
		$this->db->select('period')->from('courses')->where('code', $course_code);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function delete_course($course_code, $course_period)
	{
		if(count($this->db->select()->from('courses')->where('code', $course_code)->where('period', $course_period)->get()->result()) > 0)
		{
			$query = $this->db->query('
				SELECT id FROM lectures
				WHERE course_code = ?
				AND course_period = ?
			',array($course_code, $course_period));
			$lectures = $query->result();
			
			foreach($lectures as $lecture)
			{
				$query = $this->db->query('
					DELETE FROM lecture_notes
					WHERE lecture_id = ?
				',array($lecture->id));
			}
			$query = $this->db->query('
				DELETE FROM lectures
				WHERE course_code = ?
				AND course_period = ?
			',array($course_code, $course_period));
			
			$query = $this->db->query('
				DELETE FROM courses
				WHERE code = ?
				AND period = ?
			',array($course_code, $course_period));
	
			return true;
		}
		else
		{
			return false;
		}
	}

	
	/*****************************
	* Lectures
	********************************************/

	function get_all_lectures_count()
	{
		$query = $this->db->query('
				SELECT COUNT(*) AS count
				FROM lectures
			');
		return $query->row()->count;
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
		$lectures = $this->db->select()->from('lectures')->order_by('startTime', 'desc')->get()->result();
		foreach ($lectures as $lecture) {
			$lecture->lecture_notes = $this->db->select()->from('lecture_notes')->where('lecture_id', $lecture->id)->order_by('time','desc')->get()->result();
			$lecture->course = $this->db->select()->from('courses')->where('code', $lecture->course_code)->where('period', $lecture->course_period)->get()->row();
		}
		
		return $lectures;
	}

	function get_lectures($course_code, $course_period)
	{
		$lectures = $this->db->select()->from('lectures')->where('course_code', $course_code)->where('course_period', $course_period)->order_by('startTime', 'desc')->get()->result();
		
		foreach ($lectures as $lecture) {
			$lecture->lecture_notes = $this->db->select()->from('lecture_notes')->where('lecture_id', $lecture->id)->order_by('time','desc')->get()->result();
			$lecture->course = $this->db->select()->from('courses')->where('code', $lecture->course_code)->where('period', $lecture->course_period)->get()->row();
		}

		return $lectures;
	}
	
	function get_lecture($lecture_id)
	{
		$this->db->select()->from('lectures')->where('id', $lecture_id);
		
		$query = $this->db->get();
		$lecture = $query->row();//returns only the first row
		
		$lecture->course = $this->get_course($lecture->course_code, $lecture->course_period);
		
		return $lecture;
	}
	
	function delete_lecture($lecture_id)
	{
		if(count($this->db->select()->from('lectures')->where('id', $lecture_id)->get()->result()) > 0)
		{
			$query = $this->db->query('
				DELETE FROM lecture_notes
				WHERE lecture_id = ?
			',array($lecture_id));
			
			$query = $this->db->query('
				DELETE FROM lectures
				WHERE id = ?
			',array($lecture_id));

			return true;
		}
		else
		{
			return false;
		}
	}


	/*****************************
	* Lecture Notes
	********************************************/

	function get_all_lecture_notes_count()
	{
		$query = $this->db->query('
				SELECT COUNT(*) AS count
				FROM lecture_notes
			');
		return $query->row()->count;
	}
	
	function get_lecture_notes($lecture_id)
	{
		$this->db->select()->from('lecture_notes')->where('lecture_id', $lecture_id);
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_lecture_note($lecture_note_id)
	{
		$this->db->select()->from('lecture_notes')->where('id', $lecture_note_id);
		
		$query = $this->db->get();
		return $query->row();
	}
	
	function delete_lecture_note($lecture_note_id)
	{
		if(count($this->db->select()->from('lecture_notes')->where('id', $lecture_note_id)->get()->result()) > 0)
		{
			$query = $this->db->query('
				DELETE FROM lecture_notes
				WHERE id = ?
			',array($lecture_note_id));
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * Get latest notes
	 * @param int $count 
	 * @return array with latest notes
	 */
	function get_latest_notes($count = 10)
	{
		$this->db->select()->from('lecture_notes')->limit($count)->order_by('time','desc');
		
		$query = $this->db->get();
		return $query->result();
	}

	/*****************************
	* Camera Units
	********************************************/
	
	function get_camera_unit($camera_name = false)
	{
		$this->db->select()->from('camera_units')->where('name', $camera_name);
		
		$query = $this->db->get();
		return $query->row();
	}
	
	function get_all_camera_units()
	{
		$this->db->select()->from('camera_units');
		
		$camera_units = $this->db->get()->result();
		
		return $camera_units;
	}
}

/* End of file lecture_note_library.php */
/* Location: ./application/model/lecture_note_library.php */