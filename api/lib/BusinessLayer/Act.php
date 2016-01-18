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

	class Act extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */

		static protected $_ENTITY = 'Act';
     
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
			
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
		    'title' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
		    'subtitle' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'description' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
		    	'default' => ''
			),
		    'social' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
		    	'default' => '{}'
		    ),
		    'location_id' => array(
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
		    'suspended' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'banned' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
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
