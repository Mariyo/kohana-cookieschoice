<?php

defined('SYSPATH') or die('No direct script access.');

abstract class Cookieschoice_Cookieschoice {

	public static function render($configuration = 'default') {
		if (!empty($_COOKIE['Cookieschoice']))
			return;

		$config = Kohana::$config->load('cookieschoice.' . $configuration);

		if (empty($config['view']))
			throw new Kohana_Exception('Invalid Cookieschoice configuration');

		echo View::factory($config['view'])
				->set('domain', self::get_domain($configuration));
	}

	public static function get_domain($configuration) {
		// Load config
		$config = Kohana::$config->load('cookieschoice.' . $configuration);

		// If domain is set in config
		if (!empty($config['domain']))
			return $config['domain'];

		// Otherwise parse host
		$host = Arr::get($_SERVER, 'HTTP_HOST');
		$host_arr = explode('.', $host);

		// Return last two domains from host as default
		return implode('.', array_splice($host_arr, -2, 2));
	}

}
