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

namespace n2\System;

if(!defined('N2_INCLUDE')) exit();

class Loader
{
	private static $packageDir = 'packages';
	private static $loadedClasses = array();
	private static $loadedPackages = array();
	private static $manifestExt = 'ma';
	
	// --------------------------------------------------------------------------

	/**
	 * Load a specific class within a package
	 */
	public static function loadClass($target)
	{
		// Generate the path to the .php file we're going to load
		$payload = SYSTEM_DIR . '/' . Loader::$packageDir . '/' . substr(str_replace(array('/', '\\'), \DIRECTORY_SEPARATOR, $target), 3) . EXT;
		
		// Load it if it exists
		if(file_exists($payload))
			require_once($payload);
		else
			trigger_error('Not found: ' . $target, E_USER_ERROR);
			
		// Mark it as loaded
		self::$loadedClasses[] = $target;
	}
	
	/**
	 * Load a package using the manifest file
	 */
	public static function loadPackage($target)
	{
		$payload = str_replace(array('/', '\\'), \DIRECTORY_SEPARATOR, $target);

		$manifest = parse_ini_file(SYSTEM_DIR . '/' . Loader::$packageDir . '/' . $payload . '/' . $target . '.manifest' . EXT, true);

		var_dump($manifest);
		
		self::$loadedPackages[] = $target;
	}

	/**
	 * Register Loader::loadClass as the __autoload function
	 */
	public static function register($namespace)
	{
		spl_autoload_register($namespace . 'Loader::loadClass');
	}
	
	/**
	 * Unregister the __autoload function
	 */
	public static function unregister($namespace)
	{
		spl_autoload_unregister($namespace . 'Loader::loadClass');
	}
	
	/**
	 * Has a class already been loaded?
	 */
	public static function loadedClass($target)
	{
		return isset(self::$loadedClasses[$target]);
	}
	
	/**
	 * Has a package already been loaded?
	 */
	public static function loadedPackage($target)
	{
		return isset(self::$loadedPackages[$target]);
	}
	
	/**
	 * Import a class or package
	 */
	public static function import($target)
	{
		
	}
}

/* End of file Loader.class.php */
/* Location: ./system/core/Loader.class.php */