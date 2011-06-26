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
	/**
	 * Register a function as the default error handler
	 */
	public static function registerErrorHandler($handler)
	{
		set_error_handler($handler);
	}
	
	/**
	 * Register a function as the default exception handler
	 */
	public static function registerExceptionHandler($handler)
	{
		set_exception_handler($handler);
	}
	
	/**
	 * Error handler
	 */
	public static function _handleError($errno, $errstr, $errfile, $errline, $errcontext)
	{
	
	}
	
	/**
	 * Exception handler
	 */
	public static function _handleException()
	{
	
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Display a generic error message
	 */
	private static function displayMessage()
	{
	
	}
}

/* End of file Exception.php */
/* Location: ./system/packages/Framework/Exception.php */