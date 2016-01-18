<?php
	/**
	 * @brief Talent Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class TalentController extends AssociationController {
		
		static protected $_ENTITY = 'Talent';
		static protected $_MANAGER = 'TalentManager';
				
	}
