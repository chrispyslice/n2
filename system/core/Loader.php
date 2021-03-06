<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Loader.php
 * @version		1.0
 * @date		26/06/2011
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
	private static $instantiations = array();
	
	// --------------------------------------------------------------------------

	/**
	 * Load a specific class within a package
	 * We can mark the $target to not be instantiated
	 */
	public static function loadClass($target, $instantiate = true, $continuation = null)
	{
		// Implement the singleton model...
		if(!self::loadedClass($target))
		{
			// Generate the path to the .php file we're going to load
			$payload = SYSTEM_DIR . DIRECTORY_SEPARATOR . self::$packageDir . DIRECTORY_SEPARATOR . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $target) . EXT;	

			// Load it if it exists
			if(file_exists($payload))
				require_once $payload;
			else
				trigger_error('Not found: ' . $target, E_USER_ERROR);
				
			// Mark it as loaded
			self::$loadedClasses[] = $target;
			
			// Instantiate if required
			if($instantiate)
				self::$instantiations[$target] = new $target;
		}

		if($instantiate && $continuation)
			$continuation(self::$instantiations[$target]);
		else
			$continuation();
	}
	
	/**
	 * Get an instance of a class. This is better than using the new keyword, since we can manage the instantiations
	 */
	public static function &getInstance($target)
	{
		if(!self::instantiatedYet($target))
		{
			// Generate the path to the .php file we're going to load
			$payload = SYSTEM_DIR . DIRECTORY_SEPARATOR . self::$packageDir . DIRECTORY_SEPARATOR . str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $target) . EXT;
			
			if(file_exists($payload))
				require_once $payload;
			else
				trigger_error("Not found: " . $target, E_USER_ERROR);
				
			self::$instantiations[$target] = new $target;
		}
		
		return self::$instantiations[$target];
	}
	
	/**
	 * Load a package using the manifest file
	 */
	public static function loadPackage($target)
	{
		// Make sure that packages which have already been loaded aren't loaded again
		if(self::loadedPackage($target)) return;
		
		// What directory will we be loading from...
		$directory = SYSTEM_DIR . DIRECTORY_SEPARATOR . self::$packageDir . DIRECTORY_SEPARATOR . str_replace(array('/', '\\'), \DIRECTORY_SEPARATOR, $target);
	
		// Test if the package actually exists...
		if(!is_dir($directory))
			trigger_error('The package <code>' . $target . '</code> does not exist');
	
		// List the contents of the directory and include every PHP file we find
		foreach(self::listDirectory($directory) as $item)
			if(substr($item, -4, 4) == EXT)
				self::loadClass($target . '\\' . substr($item, 0, -4), false, function() {});
				
		// Add the $target to the list of loaded packages
		self::$loadedPackages[] = $target;
	}

	/**
	 * Register Loader::loadClass as the __autoload function
	 */
	public static function registerAutoloadHandler($namespace)
	{
		spl_autoload_register($namespace . 'Loader::loadClass');
	}
	
	/**
	 * Unregister the __autoload function
	 */
	public static function unregisterAutoloadHandler($namespace)
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
	 * Has a class already been instnatiated?
	 */
	public static function instantiatedYet($target)
	{
		return isset(self::$instantiations[$target]);
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
		if(substr($target, -1, 1) == '*')
			self::loadPackage($target);
		else
			self::loadClass($target);
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * List the contents of a directory
	 */
	private static function listDirectory($directory)
	{
		return scandir($directory);
	}
}

/* End of file Loader.class.php */
/* Location: ./system/core/Loader.class.php */