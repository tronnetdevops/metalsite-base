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

	class Owner extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */
		
		static protected $_ENTITY = 'Owner';
    
    
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
		    'account_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Create' => array(
						'required' => true
					),
					'Get' => array(
						'default' => -1
					)
				)
		    ),
		    'venue_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Create' => array(
						'required' => true
					),
					'Get' => array(
						'default' => -1
					)
				)
		    ),
		    'position' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'status' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
			),
		    'privilege_level' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'role' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
			),
		    'type' => array(
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
			'start' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
			'end' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
			'created' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    )
	    );
		
	    /**#@-*/
		
	}
