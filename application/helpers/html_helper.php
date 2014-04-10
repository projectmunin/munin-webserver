<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('error_message_html'))
{
	function error_message_html($title,$message,$dismissable = false)
	{
		$CI =& get_instance();
		$args = array(
			'title' => $title,
			'message' => $message,
			'dismissable' => $dismissable
		);
		return $CI->load->view("elements/message_error",$args,true);
	}
}

if ( ! function_exists('success_message_html'))
{
	function success_message_html($title,$message,$dismissable = false)
	{
		$CI =& get_instance();
		$args = array(
			'title' => $title,
			'message' => $message,
			'dismissable' => $dismissable
		);
		return $CI->load->view("elements/message_success",$args,true);
	}
}


/* End of file html_helper.php */
/* Location: ./application/helpers/html_helper.php */