<?php
	/**
	 * @brief Hoster Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class HosterController extends AssociationController {
		
		static protected $_ENTITY = 'Hoster';
		static protected $_MANAGER = 'HosterManager';
				
	}
