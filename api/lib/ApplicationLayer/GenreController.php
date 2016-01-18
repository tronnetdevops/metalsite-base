<?php
	/**
	 * @brief Genre Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class GenreController extends AssociationController {
		
		static protected $_ENTITY = 'Genre';
		static protected $_MANAGER = 'GenreManager';
				
	}
