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

if ( ! function_exists('admin_camera_unit_url'))
{
	function camera_unit_url($camera_unit_name = false)
	{
		if(!$camera_unit_name)
		{
			return site_url("/admin/cameras");
		}
		else
		{
			return site_url("/admin/cameras/".$camera_unit_name);
		}
	}
}

/* End of file pretty_date_helper.php */
/* Location: ./application/helpers/pretty_date_helper.php */