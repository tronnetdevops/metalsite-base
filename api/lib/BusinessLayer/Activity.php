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

	class Activity extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */

		static protected $_ENTITY = 'Activity';
    
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
			'type' => array(
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
			'action' => array(
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
			'data' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
		    ),
			'date' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
		    ),
		    'account_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    ),
		    'act_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    ),
			'event_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    ),
			'venue_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    ),
			'tag_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    ),
			'location_id' => array(
		    	'permissions' => BaseEntity::EAP_WRITE,
				'directives' => array(
					'Get' => array(
						'default' => -1
					)
				)
		    )
	    );
		
	    /**#@-*/
		
	}
