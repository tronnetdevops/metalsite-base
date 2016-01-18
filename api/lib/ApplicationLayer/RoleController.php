<?php
	/**
	 * @brief Role Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class RoleController extends AssociationController {
		
		static protected $_ENTITY = 'Role';
		static protected $_MANAGER = 'RoleManager';
				
	}
