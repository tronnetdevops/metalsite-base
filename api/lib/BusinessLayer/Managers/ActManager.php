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

	abstract class ActManager extends BaseManager implements BusinessManager{
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Act';
	    static protected $_KEY = 'acts';
		
		static protected $objects = array();
		
	    /**#@-*/
		
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
    
	    /**#@-*/		
	}