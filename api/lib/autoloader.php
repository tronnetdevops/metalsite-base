<?php
	
	namespace SatanBarbaraAPI;	

	function SatanBarbaraAutoloader($class){
	
		/**
		 * Removing namespace from classname so we can match to filename
		 */
		$classParsed = explode('\\', $class);
		$className = end( $classParsed );
			
	    if (file_exists( SATANBARBARA_API_PATH . '/lib/BusinessLayer/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/BusinessLayer/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/BusinessLayer/Contracts/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/BusinessLayer/Contracts/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/BusinessLayer/Managers/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/BusinessLayer/Managers/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/DataLayer/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/DataLayer/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/DataAccessLayer/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/DataAccessLayer/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/ApplicationLayer/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/ApplicationLayer/' . $className . '.php');
	        return;
	    } else if (file_exists( SATANBARBARA_API_PATH . '/lib/ApplicationLayer/Handlers/' . $className . '.php')) {
	        include_once( SATANBARBARA_API_PATH . '/lib/ApplicationLayer/Handlers/' . $className . '.php');
	        return;
	    } else if ($className == 'Exception') {
	        include_once( SATANBARBARA_API_PATH . '/lib/ApplicationLayer/Handlers/ExceptionHandler.php');
	        return;
		} else {
	    	die('The class ' . $className .' requested does not exist');
	    }
	}

	/**
	 * Register SQL Autoloader so that classes can be dynamically created.
	 */
	spl_autoload_register( SATANBARBARA_API_NAMESPACE . 'SatanBarbaraAutoloader');