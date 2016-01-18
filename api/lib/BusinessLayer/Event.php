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

	class Event extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */

		static protected $_ENTITY = 'Event';
    
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
		    'instructions' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
		    	'default' => ''
			),
			
		    'age' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				),
				'process' => array(
					'enum' => array(
						'All Ages',
						'18+',
						'21+'
					)
				)
			),
		    'price' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
			),
		    'start' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
			),
		    'end' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
				'directives' => array(
					'Create' => array(
						'required' => true
					)
				)
			),
		    'ticket_url' => array(
		    	'permissions' => BaseEntity::EAP_UPDATE,
		    	'default' => 'http://'
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
