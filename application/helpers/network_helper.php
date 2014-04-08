<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// http://stackoverflow.com/questions/1239068/ping-site-and-return-result-in-php
if ( ! function_exists('ping'))
{
	function ping($host, $port, $timeout) {
		$tB = microtime(true); 
		$fP = @fSockOpen($host, $port, $errno, $errstr, $timeout);
		if (!$fP) { return "down"; } 
		$tA = microtime(true); 
		return round((($tA - $tB) * 1000), 0)." ms";
	}
}


/* End of file network_helper.php */
/* Location: ./application/helpers/network_helper.php */