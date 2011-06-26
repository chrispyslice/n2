<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Dispatch.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace n2\System;

if(!defined('N2_INCLUDE')) exit();

class Dispatch
{
	private static $callbacks = array();
	
	public static function register(Event $event, $function)
	{
		// Ensure that the $function is actually a function
		if(!is_callable($function))
			throw new NException("Error registering callback for event $event: $function is not callable");
		
		// Add it to self::$callbacks
		self::$callbacks[$event][] = $function;
	}
	
	public static function fire($event, $args)
	{
		// Ensure that we have some functions to call
		if(!isset(self::$callbacks[$event]))
			return false;
		
		// Call all the functions associated with $event
		foreach(self::$callbacks[$event] as $e)
			call_user_func($e, $args);
	}
}

/* End of file Dispatch.php */
/* Location: ./system/packages/System/Dispatch.php */