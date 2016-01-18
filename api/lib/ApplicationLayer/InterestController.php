<?php
	/**
	 * @brief Interest Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class InterestController extends AssociationController {
		
		static protected $_ENTITY = 'Interest';
		static protected $_MANAGER = 'InterestManager';
				
	}
