<?php
	/**
	 * @brief Event Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class EventController extends BaseController {
		
		static protected $_ENTITY = 'Event';
		static protected $_MANAGER = 'EventManager';
				
	}
