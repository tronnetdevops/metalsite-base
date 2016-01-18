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

	class Account extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */
		
		static protected $_ENTITY = 'Account';
		
    
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
			
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
		    'username' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
		    'password' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
		    'fname' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ), 
		    'lname' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'nickname' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'tagline' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
		    ),
		    'email' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
			'bio' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'default' => '' 
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
			'location_id' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE
			),
		    'anonymous' => array(
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
