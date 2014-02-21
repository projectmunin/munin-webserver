<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('_t'))
{
	function _t($line)
	{
		$CI =& get_instance();
		$translation = $CI->lang->line($line);

		if($translation)
		{
			return $translation;
		}
		else
		{
			return $line;
		}
	}
}
