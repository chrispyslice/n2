<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Controller.php
 * @version		1.0
 * @date		11/06/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace System;

if(!defined('N2_INCLUDE')) exit();

class Controller
{
	private $router;
	
	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->router = Loader::getInstance('System\Routes');
	}
}
 
/* End of file Controller.php */
/* Location: ./system/packages/System/Controller.php */