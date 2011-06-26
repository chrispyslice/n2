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
// 
// --------------------------------------------------------------------------

/**
 * Start the loader
 */
require_once 'Loader.class' . EXT;

/**
 * Include the System package
 */
System\Loader::loadPackage('System');

// Fire events
System\Dispatch::fire('System.beforeRegister', array());

/**
 * Register any
 */
System\Loader::registerAutoloadHandler('n2\System\\');
System\NException::registerErrorHandler('n2\System\NException::_handleError');
System\NException::registerExceptionHandler('n2\System\NException::_handleException');

System\Dispatch::fire('System.a');

/* End of file bootloader.php */
/* Location: ./system/core/bootloader.php */