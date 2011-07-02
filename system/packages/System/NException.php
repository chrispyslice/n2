<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		NException.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace n2\System;

if(!defined('N2_INCLUDE')) exit();

class NException extends \Exception
{
	public function __construct($message, $code = 100)
	{
		parent::__construct($message, $code);
	}
}

/* End of file Exception.php */
/* Location: ./system/packages/Framework/Exception.php */