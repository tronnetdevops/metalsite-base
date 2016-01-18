<?php
	/**
	 * @brief Venue Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class VenueController extends BaseController {
		
		static protected $_ENTITY = 'Venue';
		static protected $_MANAGER = 'VenueManager';
				
	}
