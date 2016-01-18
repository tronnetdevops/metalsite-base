<?php
	/**
	 * @brief Tag Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class TagController extends BaseController {
		
		static protected $_ENTITY = 'Tag';
		static protected $_MANAGER = 'TagManager';
				
	}
