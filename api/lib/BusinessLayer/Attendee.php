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

	class Attendee extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */
		
		static protected $_ENTITY = 'Attendee';
    
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
		    'event_id' => array(
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
			
		    'state' => array(
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
			'created' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    )
	    );
		
	    /**#@-*/
		
	}
