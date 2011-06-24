<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		n2.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace n2;
 
if(!defined('N2_INCLUDE')) exit('No direct access permitted');

require_once('Loader.class' . EXT);
System\Loader::register('n2\System\\');

System\Loader::loadPackage('TestPackage');

$t = new Abstraction\Test();

/* End of file n2.php */
/* Location: ./system/n2/n2.php */