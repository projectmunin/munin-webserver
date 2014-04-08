<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('ping'))
{
	function ping($host,$retries,$timeout)
	{
		exec(sprintf('ping -c '.$retries.' -W '.$timeout.' %s', escapeshellarg($host)), $res, $rval);
		return $rval === 0;
	}
}


/* End of file network_helper.php */
/* Location: ./application/helpers/network_helper.php */