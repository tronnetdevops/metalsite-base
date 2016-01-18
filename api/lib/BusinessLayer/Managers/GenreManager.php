<?php
	/**
	 * @brief Genre Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class GenreManager extends AssociationManager implements BusinessManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
		
	    /**@* {String} Name of table in the database. */
		static protected $_ENTITY = 'Genre';
	    static protected $_KEY = 'genres';
		
		static protected $objects = array();
		
		static protected $associations = array(
			'from' => array(
				'key' => 'acts',
				'field' => 'id',
				'binder' => 'act_id'
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