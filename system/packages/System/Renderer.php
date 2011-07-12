<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Renderer.php
 * @version		1.0
 * @date		03/06/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */

namespace System;

if(!defined('N2_INCLUDE')) exit();

class Renderer
{
	public function hello()
	{
		echo "hello, world";
	}
	
	public static function gzipOutput()
	{	
		// Suspend outout buffering
		$contents = ob_get_contents();
		ob_end_clean();
		
		// Start the gzip compression
		header('Content-Encoding: gzip');
		echo '\x1f\x8b\x08\x00\x00\x00\x00\x00';
		
		// Compress the buffer and output it
		echo substr(gzcompress($contents, 9), 0, strlen($contents));
	}

	public function startBuffering($callback = false)
	{
		ob_start($callback);
	}
	
	public function endBuffering()
	{
	
	}
	
	public function httpHeader($code, $message)
	{
		header("HTTP/1.1 $code $message");
	}
	
	public function redirect($to)
	{
		header("Location: $to");
	}
}

/* End of file Renderer.php */
/* Location: ./system/packages/System/Renderer.php */