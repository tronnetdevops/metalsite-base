<?php
	/**
	 * @brief Owner Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class OwnerController extends AssociationController {
		
		static protected $_ENTITY = 'Owner';
		static protected $_MANAGER = 'OwnerManager';
				
	}
