<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Event.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace System;

if(!defined('N2_INCLUDE')) exit();

interface Event
{
	/**
	 * Entry pont to the Event
	 */
	public function fire();
}

/* End of file Event.php */
/* Location: ./system/packages/System/Event.php */