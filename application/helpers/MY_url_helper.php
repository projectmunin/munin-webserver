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

if ( ! function_exists('admin_url'))
{
	function admin_url()
	{
		return site_url("/admin");
	}
}

if ( ! function_exists('admin_courses_url'))
{
	function admin_courses_url()
	{
		return site_url("/admin/courses");
	}
}

if ( ! function_exists('admin_users_url'))
{
	function admin_users_url()
	{
		return site_url("/admin/users");
	}
}

if ( ! function_exists('admin_camera_unit_url'))
{
	function admin_camera_unit_url($camera_unit_name = false)
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

if ( ! function_exists('admin_course_url'))
{
	function admin_course_url($course_code,$course_period)
	{
		return site_url("/admin/courses/".$course_code."/".$course_period);
	}
}

if ( ! function_exists('admin_lecture_url'))
{
	function admin_lecture_url($lecture_id)
	{
		return site_url("/admin/lecture/".$lecture_id);
	}
}

if ( ! function_exists('admin_camera_units'))
{
	function admin_camera_units()
	{
		return site_url("/admin/cameras");
	}
}

if ( ! function_exists('admin_delete_course_url'))
{
	function admin_delete_course_url($course_code,$course_period)
	{
		return site_url("/admin/courses/".$course_code."/".$course_period."/delete");
	}
}

if ( ! function_exists('admin_delete_lecture_note_url'))
{
	function admin_delete_lecture_note_url($lecture_note_id)
	{
		return site_url("/admin/lecture/".$lecture_note_id."/delete");
	}
}


/* End of file pretty_date_helper.php */
/* Location: ./application/helpers/pretty_date_helper.php */