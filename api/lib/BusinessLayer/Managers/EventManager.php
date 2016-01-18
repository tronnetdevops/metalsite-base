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

	abstract class EventManager extends BaseManager implements BusinessManager{
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Event';
	    static protected $_KEY = 'events';
		
		static protected $objects = array();
		
		static protected $mergers = array(
			'Performance' => array(
				'entity' => 'Performance',
				'to' => array(
					'key' => 'performances',
					'field' => 'event_id'
				),
				'from' => array(
					'key' => 'events',
					'field' => 'id'
				),
				'fields' => '*'
			)
		);
		
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