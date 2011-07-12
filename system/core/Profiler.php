<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Profiler.php
 * @version		1.0
 * @date		11/07/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace n2;

if(!defined('N2_INCLUDE')) exit();

class Profiler
{
	private $startTime;
	
	// --------------------------------------------------------------------------
	
	private function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	
	
}

/* End of file Profiler.php */
/* Location: ./system/core/Profiler.php */