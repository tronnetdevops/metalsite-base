<?php
	/**
	 * @brief Hoster Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class HosterManager extends AssociationManager implements BusinessManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Hoster';
	    static protected $_KEY = 'hosters';
		
		static protected $objects = array();
		
		static protected $associations = array(
			'from' => array(
				'key' => 'events',
				'field' => 'id',
				'binder' => 'events_id'
			),
			'to' => array(
				'key' => 'venues',
				'field' => 'id',
				'binder' => 'venue_id'
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