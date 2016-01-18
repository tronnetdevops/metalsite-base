<?php
	/**
	 * @brief Location Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class LocationController extends BaseController {
		
		static protected $_ENTITY = 'Location';
		static protected $_MANAGER = 'LocationManager';
				
	}
