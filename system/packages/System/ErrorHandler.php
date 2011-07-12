<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		ErrorHandler.php
 * @version		1.0
 * @date		27/06/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace System;

if(!defined('N2_INCLUDE')) exit();

class ErrorHandler
{
	private static $templateDir = 'templates';
	private static $errorTemplate = 'error';
	private static $exceptionTemplate = 'exception';
	private static $levels = array(
		E_ERROR				=>	'Error',
		E_WARNING			=>	'Warning',
		E_PARSE				=>	'Parse Error',
		E_NOTICE			=>	'Notice',
		E_CORE_ERROR		=>	'Core Error',
		E_CORE_WARNING		=>	'Core Warning',
		E_COMPILE_ERROR		=>	'Compile Error',
		E_COMPILE_WARNING	=>	'Compile Warning',
		E_USER_ERROR		=>	'User Error',
		E_USER_WARNING		=>	'User Warning',
		E_USER_NOTICE		=>	'User Notice',
		E_STRICT			=>	'Runtime Notice'
	);

	// --------------------------------------------------------------------------

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
	 * Default error handler for n2
	 */
	public static function _handleError($errno, $errstr, $errfile, $errline, $errcontext)
	{
		// Change $errno to a string
		$type = isset(self::$levels[$errno]) ? self::$levels[$errno] : $errno;
	
		// Buffer the template
		ob_start();
		include SYSTEM_DIR . DIRECTORY_SEPARATOR . self::$templateDir . DIRECTORY_SEPARATOR . self::$errorTemplate . EXT;
		$b = ob_get_contents();
		ob_end_clean();
		
		// Display the buffer
		exit($b);
	}
	
	/**
	 * Default exception handler for n2
	 */
	public static function _handleException($e)
	{
		// Buffer output
		ob_start();
		include SYSTEM_DIR . DIRECTORY_SEPARATOR . self::$templateDir . DIRECTORY_SEPARATOR .self::$exceptionTemplate. EXT;
		$b = ob_get_contents();
		ob_end_clean();
		
		// Display the buffer
		echo($b);
	}
}

/* End of file ErrorHandler.php */
/* Location: ./system/packages/System/ErrorHandler.php */