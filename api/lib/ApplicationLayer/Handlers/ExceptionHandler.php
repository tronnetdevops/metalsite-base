<?php
	/**
	 * @brief API Interface
	 *
	 * ## Overview
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */

	namespace SatanBarbaraAPI;

	class Exception extends \Exception {}
		
	class MySQLConnectionFailure extends \Exception {

	}
		
	abstract class ExceptionHandler {
		
	}