<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('course_url'))
{
	function course_url($course_code,$course_period)
	{
		return site_url("/course/".$course_code."/".$course_period);
	}
}

if ( ! function_exists('lecture_url'))
{
	function lecture_url($lecture_id)
	{
		return site_url("/lecture/".$lecture_id);
	}
}

if ( ! function_exists('browse_url'))
{
	function browse_url()
	{
		return site_url("/");
	}
}

/* End of file pretty_date_helper.php */
/* Location: ./application/helpers/pretty_date_helper.php */