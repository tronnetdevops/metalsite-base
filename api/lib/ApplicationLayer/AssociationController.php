<?php
	/**
	 * @brief Account Manager for Account Objects.
	 *
	 * ## Overview
	 *
     * @see AccountController
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class AssociationController extends BaseController {

		static public function Delete($params) {
			$params = self::FilterParams('get', 'Delete', $params);

			$deleted = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Delete', 
				$params['ids']
			);
			
			return 'There were '.$deleted.' records succesfully removed.';
		}
		
		// static public function Search($params) {
		// 	$params = self::FilterParams('get', 'Search', $params);
		//
		// 	$results = array();
		//
		// 	/**
		// 	 * This is somewhat superfluous
		// 	 */
		// 	$params['criteria'] = $params;
		//
		// 	$results = call_user_func(
		// 		SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Fetch',
		// 		array(-1),
		// 		$params['fields'],
		// 		$params['limit'],
		// 		$params['offset'],
		// 		$params['orderBy'],
		// 		$params['orderByDir'],
		// 		$params['groupBy'],
		// 		$params['criteria'],
		// 		$params['delineation'],
		// 		$params['operator']
		// 	);
		//
		// 	return $results;
		// }
	}