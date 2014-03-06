<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// TODO check copyright?
// http://www.interactivetools.com/forum/forum-posts.php?postNum=2208966
if ( ! function_exists('pretty_relative_time'))
{
	function pretty_relative_time($time)
	{
		if ($time !== intval($time))
		{
			$time = strtotime($time);
		}
		$d = time() - $time;
		if ($time < strtotime(date('Y-m-d 00:00:00')) - 60*60*24*3)
		{
			$format = 'F j H:i';
			if (date('Y') !== date('Y', $time))
			{
				$format .= ", Y";
			}
			return date($format, $time);
		}
		if ($d >= 60*60*24)
		{
			$day = 'Yesterday';
			if (date('l', time() - 60*60*24) !== date('l', $time))
			{
				$day = date('l', $time);
			}
			return $day . " at " . date('g:ia', $time);
		}
		if ($d >= 60*60*2)
		{
			return intval($d / (60*60)) . " hours ago";
		}
		if ($d >= 60*60)
		{
			return "about an hour ago";
		}
		if ($d >= 60*2)
		{
			return intval($d / 60) . " minutes ago";
		}
		if ($d >= 60)
		{
			return "about a minute ago";
		}
		if ($d >= 2)
		{
			return intval($d) . " seconds ago"; 
		}
		return "a few seconds ago";
	}
}


/* End of file pretty_date_helper.php */
/* Location: ./application/helpers/pretty_date_helper.php */