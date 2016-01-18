<?php
	/**
	 * @brief Attendee Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class AttendeeController extends AssociationController {
		
		static protected $_ENTITY = 'Attendee';
		static protected $_MANAGER = 'AttendeeManager';
				
	}
