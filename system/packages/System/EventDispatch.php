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

class EventDispatch
{
	/**
	 * Fire the callbacks associated to an event
	 */
	public static function fire($event, $args = null)
	{
		$directory = APPLICATION_DIR . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'default' . DIRECTORY_SEPARATOR . 'events' . DIRECTORY_SEPARATOR . str_replace(array('.'), DIRECTORY_SEPARATOR, $event);
		
		// Check if $directory exists
		if(!is_dir($directory))
			return;
					
		foreach(scandir($directory) as $item)
			if(substr($item, -4, 4) == EXT)
			{
				require_once $directory . DIRECTORY_SEPARATOR . $item;
				$classname = substr($item, 0, -4);
				$t = new $classname();
				$t->fire();
			}
	}
}

/* End of file Dispatch.php */
/* Location: ./system/packages/System/Dispatch.php */