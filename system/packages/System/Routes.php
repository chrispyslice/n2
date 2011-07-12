<?php

/**
 * N2
 * 
 * @license		CC BY-SA 3.0
 * @author		Chris Atkin
 * @link		http://chrisatk.in/
 * @email		contact {at} chrisatk {dot} in
 * 
 * @file		Exception.php
 * @version		1.0
 * @date		05/26/2011
 * 
 * Copyright (c) 2011 Chris Atkin. All rights reserved.
 */
 
namespace System;

if(!defined('N2_INCLUDE')) exit();

class Routes
{
	private $slug;
	private $slug_parts;
	private $module;
	private $controller;
	private $method;
	
	// --------------------------------------------------------------------------
	
	const SEPARATOR = '/';
	const DEFAULT_MODULE = 'default';
	const DEFAULT_CONTROLLER = 'index';
	const DEFAULT_METHOD = 'index';
	
	// --------------------------------------------------------------------------

	public function __construct()
	{
		// Get the URL slug and decompose it into it's constituents
		$this->slug = $_SERVER['PATH_INFO'];
		$this->slug_parts = explode(self::SEPARATOR, $this->slug);
		
		// Assign the module
		$this->module = $this->slug_parts[1];
		$this->controller = $this->slug_parts[2];
		$this->method = $this->slug_parts[3];
	}
	
	public function getSlug()
	{
		return $this->slug;
	}
	
	public function getModule()
	{
		return $this->module;
	}
	
	public function getController()
	{
		return $this->controller;
	}
	
	public function getMethod()
	{
		return $this->method;
	}
}


/* End of file Exception.php */
/* Location: ./system/packages/Framework/Exception.php */