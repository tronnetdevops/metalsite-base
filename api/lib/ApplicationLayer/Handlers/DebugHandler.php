<?php
/**
 * @brief Debug Manager
 *
 * ## Overview
 * This file exists as
 *
 * @package SatanBarbara
 * @subpackage Application
 * @category Managers
 * @version 0.7.2b
 * @since 0.5.1b
 * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
 * @copyright Copyright (c) 2015, Sean Murray
 *
 * @abstract
 */

	namespace SatanBarbaraAPI;

	abstract class DebugHandler {
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
    
	    /**
		 * Flag that determines if logs actually get recorded in logs. 
		 * @var bool
		 */
		static public $active = true;
		static public $level = 1;
				
		const ALERT_LEVEL = -1;

		const DEBUG_LEVEL = 1;
		const CRITICAL_LEVEL = 2;
		const WARNING_LEVEL = 3;
		const SYSTEM_LEVEL = 4;
		
	    /**#@-*/
		
	    /**
	     * Class Methods
	     */
		
	    /**#@+
		 * @static
	     * @access public
	     */
    
	    /**
	     * Log Message
	     *
	     * ## Overview
	     *
	     * @uses DebugManager
	     *
		 * @param mixed $message Either a string or an object to be logged.
	     * @return true Always unless fatal error or exception is thrown.
	     *
		 * @version 2015-07-05.1
		 * @since 0.5.1b
	     * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	     */
		static public function Log($message, $level = null, $sep = false){
			if (!$level){
				$level = self::SYSTEM_LEVEL;
			}
			
			if (self::$active && $level <= self::$level){
				if ($sep){
					error_log(str_repeat($sep, 15));
				}
				
				if (is_string($message)){
					error_log( $message );
				} else {
					error_log(var_export( $message, true));
				}
			}
			
			return true;
		}
		
	    /**#@-*/
		
	}