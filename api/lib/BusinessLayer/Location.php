<?php
	/**
	 * @brief Account Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	class Location extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */

		static protected $_ENTITY = 'Location';
    
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
			
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
			
		    'address' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
		    'city' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'state' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
			),
		    'country' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'postal' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
			
		    'activated' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'default' => true
					)
				)
		    ),
		    'deleted' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
			'created' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    )
	    );
		
	    /**#@-*/
		
	}
