<?php
	/**
	 * @brief Account Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	interface BusinessEntity {
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
	
	    /**#@-*/
		
	
	    /**#@+
	     * @static
	     * @access private
	     */
		
	    /**#@-*/
		
		
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
    
	    /**
	     * @brief Creates a new Object.
	     *
	     * ## Overview
	     * This will parse various request parameters and attemp to call the 
		 * respective action on an object controller.
	     *
	     * @uses AccountManager
	     * @uses AJAX
	     *
	     * @return {Null} Always unless fatal error or exception is thrown.
	     *
	     * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	     * @date 02/19/2014
	     */
		public function GetValues($fieldNames);
		
	    /**#@-*/
	}