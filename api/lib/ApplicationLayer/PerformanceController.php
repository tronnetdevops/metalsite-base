<?php
	/**
	 * @brief Performance Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class PerformanceController extends AssociationController {
		
		static protected $_ENTITY = 'Performance';
		static protected $_MANAGER = 'PerformanceManager';
				
	}
