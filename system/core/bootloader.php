<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		bootloader.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace n2;

if(!defined('N2_INCLUDE')) exit('No direct access permitted');

// --------------------------------------------------------------------------

/**
 * Start the loader
 */
require_once 'Loader' . EXT;

/**
 * Include the System package
 */
System\Loader::loadPackage('System');

// Fire events
System\EventDispatch::fire('System.beforeRegistration');

/**
 * Register any handlers we need
 */
System\Loader::registerAutoloadHandler('n2\System\\');
System\ErrorHandler::registerErrorHandler('n2\System\ErrorHandler::_handleError');
System\ErrorHandler::registerExceptionHandler('n2\System\ErrorHandler::_handleException');

// Fire events
System\EventDispatch::fire('System.after');

/**
 * Instantiate system-level objects
 */
/*$_SYS = array(
	'config' => System\Loader::loadClass('System/Configuration'),
	'routes' => System\Loader::loadClass('System/Routes')
);*/

/* End of file bootloader.php */
/* Location: ./system/core/bootloader.php */