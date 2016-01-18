<?php
	/**
	 * @brief Interest Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class InterestManager extends AssociationManager implements BusinessManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Interest';
	    static protected $_KEY = 'interests';
		
		static protected $objects = array();
		
		static protected $associations = array(
			'from' => array(
				'key' => 'accounts',
				'field' => 'id',
				'binder' => 'account_id'
			),
			'to' => array(
				'key' => 'tags',
				'field' => 'id',
				'binder' => 'tag_id'
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