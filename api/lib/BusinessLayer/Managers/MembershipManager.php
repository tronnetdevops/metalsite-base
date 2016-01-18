<?php
	/**
	 * @brief Membership Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class MembershipManager extends AssociationManager implements BusinessManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Membership';
	    static protected $_KEY = 'memberships';
		
		static protected $objects = array();
		
		static protected $associations = array(
			'from' => array(
				'key' => 'accounts',
				'field' => 'id',
				'binder' => 'account_id'
			),
			'to' => array(
				'key' => 'acts',
				'field' => 'id',
				'binder' => 'act_id'
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