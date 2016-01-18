<?php
	/**
	 * @brief Membership Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class MembershipController extends AssociationController {
		
		static protected $_ENTITY = 'Membership';
		static protected $_MANAGER = 'MembershipManager';
				
	}
