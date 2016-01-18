<?php
	/**
	 * @brief Act Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
		
	abstract class ActController extends BaseController {
		
		static protected $_ENTITY = 'Act';
		static protected $_MANAGER = 'ActManager';
				
	}
