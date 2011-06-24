<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		index.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */

// --------------------------------------------------------------------------
 
namespace n2;
 
/**
 * Start error reporting
 */
 
error_reporting(E_ALL);

define('N2_INCLUDE', true);
define('APPLICATION_DIR', 'application');

// --------------------------------------------------------------------------

/**
 * Define some system-level constants
 */

define('EXT', '.php');
define('SYSTEM_DIR', 'system');

/**
 * And away we go...
 */
 
require_once SYSTEM_DIR . '/core/bootloader' . EXT;
 
/* End of file index.php */
/* Location: ./index.php */