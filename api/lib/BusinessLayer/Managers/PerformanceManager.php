<?php
	/**
	 * @brief Performance Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class PerformanceManager extends AssociationManager implements BusinessManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Performance';
	    static protected $_KEY = 'performances';
		
		static protected $objects = array();
		
		static protected $associations = array(
			'from' => array(
				'key' => 'bands',
				'field' => 'id',
				'binder' => 'band_id'
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