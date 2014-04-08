<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('ping'))
{
	function ping($host,$retries,$waittime)
	{
		exec(sprintf('ping -c %d -W %d %s', $retries, $waittime, escapeshellarg($host)), $res, $rval);
		return $rval === 0;
	}
}


/* End of file network_helper.php */
/* Location: ./application/helpers/network_helper.php */