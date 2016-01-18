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

	class Hoster extends BaseEntity implements BusinessEntity {
		
	    /**
	     * Class Properties
	     */
		
		static protected $_ENTITY = 'Hoster';
    
    
	    /**#@+
	     * @access protected
	     */
		
	    /**@* {Array} Used as a means of validating and sanitizing object properties before they reach the database. */
	    static protected $properties = array(
		    'id' => array(
		    	'permissions' => BaseEntity::EAP_READ_ONLY
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
