<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecture_note_library extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_latest_notes($count = 10)
    {
    	$this->db->select()->from('lecture_note')->limit(10)->order_by('time','desc');
    	
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file lecture_note_library.php */
/* Location: ./application/model/lecture_note_library.php */