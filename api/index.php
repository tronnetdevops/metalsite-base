<?php
	/**
	 * @brief API Entry Point
	 *
	 * ## Overview
	 * This file will deligate api requests to their appropriate function call.
	 *
	 * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
	
	namespace SatanBarbaraAPI;
	
	define('SATANBARBARA_API_NAMESPACE', 'SatanBarbaraAPI\\' );
	define('SATANBARBARA_API_ENVIRONMENT', 'development' );
	
	/**
	 * Set global path variables.
	 */
	define('SATANBARBARA_PATH', realpath( dirname( __FILE__ ) . "/.." )  );
	define('SATANBARBARA_API_PATH', SATANBARBARA_PATH . '/api' );
	define('SATANBARBARA_MYSQL_PATH', SATANBARBARA_PATH . '/resources/db/mysql' );
	
	require_once SATANBARBARA_API_PATH .'/lib/autoloader.php';
	
	error_reporting(-1);
	
	/**
	 * This allows us to make API calls from any origin.
	 * @todo Lock this down a known URI when in production.
	 */
	if (array_key_exists('HTTP_REFERER', $_SERVER)) {
		// if (SATANBARBARA_API_ENVIRONMENT == 'development'){
			$parsedURI = parse_url($_SERVER['HTTP_REFERER']);
			header('Access-Control-Allow-Origin: http://'. $parsedURI['host'] );
		// }
	}
	
	
	/**
	 * Initialize the Request Handler to start API consumption.
	 * This function will analyse the get and post variables and
	 * attempt to invoke the appropriate controller functions.
	 */
	RequestHandler::Init();
	