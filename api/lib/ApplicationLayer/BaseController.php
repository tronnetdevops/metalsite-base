<?php
	/**
	 * @brief Account Controller for API Interface
	 *
	 * ## Overview
	 *
     * @see RequestHandler
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;
	
	abstract class BaseController {
		
		static protected $_request_access = array();
		
		static private $_base_request_access = array(
			'post' => array(),
			'get' => array(
				'Get' => array(
					'permissions' => BaseEntity::EAP_READ_ONLY,
					'fields' => array(
						'ids' => array(
							'default' => -1
						), 
						'fields' => array(
							'default' => '*'
						),
						'offset' => array(
							'default' => 0
						),
						'limit' => array(
							'default' => 20
						)
					),
				), 

				'Search' => array(
					'permissions' => BaseEntity::EAP_READ_ONLY,
					'fields' => array(
						'fields' => array(
							'default' => '*'
						),
						'offset' => array(
							'default' => 0
						),
						'limit' => array(
							'default' => 20
						),
						'delineation' => array(
							'default' => 'and'
						),
						'operator' => array(
							'default' => 'like'
						),
						'orderBy' => array(
							'default' => 'id'
						),
						'orderByDir' => array(
							'default' => 'ASC'
						),
						'groupBy' => array(
							'default' => 'id'
						),
						
						// 'and' => array(),
						// 'or' => array(),
						// 'eq' => array(),
						// 'like' => array(),
						// 'neq' => array(),
						// 'gt' => array(),
					)
				),
				
				'Create' => array(
					'permissions' => BaseEntity::EAP_WRITE,
					'fields' => array()
				),
				
				'Update' => array(
					'permissions' => BaseEntity::EAP_UPDATE,
					'fields' => array(
						'ids' => array(
							'required' => true
						)
					)
				), 
				
				'Delete' => array(
					'permissions' => 0, // We don't want any fields for deletes...
					'fields' => array(
						'ids' => array(
							'required' => true
						)
					)
				)
			)
		);
		
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
    
	    /**
	     * @brief Creates a new Account.
	     *
	     * ## Overview
	     * This will parse various request parameters and attemp to call the 
		 * respective action on an object controller.
	     *
	     * @uses AccountManager
	     * @uses AJAX
	     *
	     * @return {Null} Always unless fatal error or exception is thrown.
	     *
	     * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	     * @date 02/19/2014
	     */
		static public function Create($params) {
			$params = self::FilterParams('get', 'Create', $params);
			$newObj = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Create', 
				$params
			);
			
			return $newObj->GetValues();
		}
		
		static public function Get($params) {
			$params = self::FilterParams('get', 'Get', $params);
			
			$results = array();
			
			if (!isset($params['activated'])){
				$params['activated'] = 1;
			}
			
			$objs = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Find', 
				$params
			);
			
			foreach($objs as $obj){
				$values = $obj->GetValues();
				
				if (!isset($values['deleted']) || !$values['deleted'] && (!$params['activated'] || !!$values['activated']) ){
					$results[ $values['id'] ] = $values;
				}
			}
			
			if (count($results) == 1){
				$results = reset($results);
			}
			
			return $results;
		}
		
		static public function Update($params) {
			$params = self::FilterParams('get', 'Update', $params);
			
			$objs = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Find', 
				$params
			);
			
			foreach($objs as $obj){
				$obj->SetValues( $params );
				
				$obj->Save();
				
				$values = $obj->GetValues();
				
				$results[ $values['id'] ] = $values;
			}
			
			if (count($results) == 1){
				$results = reset($results);
			}
			
			return $results;
		}
		
		static public function Delete($params) {
			$params = self::FilterParams('get', 'Delete', $params);

			$objs = self::Get( array('ids'=> $params['ids']) );
			
			$ids = explode(',', $params['ids']);
			foreach($ids as $id){
				self::Update(array(
					'id' => $id,
					'deleted' => true
				));
			}
			
			return $objs;
		}
		
		static public function Search($params) {
			$params = self::FilterParams('get', 'Search', $params);

			$results = array();
			
			if (!isset($params['activated'])){
				$params['activated'] = 1;
			}
			
			/**
			 * This is somewhat superfluous 
			 */
			$params['criteria'] = $params;
			
			$objs = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::Find', 
				$params
			);
			
			foreach($objs as $obj){
				$values = $obj->GetValues();
				
				/**
				 * The 'deleted' flag may not be present when doing 'count' searches
				 */
				if (!isset($values['deleted']) || !$values['deleted'] && (!$params['activated'] || !!$values['activated']) ){
					$results[ $values['id'] ] = $values;
				}
			}
			
			return $results;
		}
		
	    /**#@-*/
		static public function GetAccessorGrants(){
			return array_merge_recursive(self::$_base_request_access, static::$_request_access);
		}
		
		static public function ValidRequestMethod($method, $function){
			$accessorGrants = self::GetAccessorGrants();
			return isset( $accessorGrants[ $method ][ $function ] );
		}
		
		static public function FilterParams($method /** post|get */, $function, $params) {
			$missingRequired = array();
			
			$accessorGrants = self::GetAccessorGrants();
			
			$methodGrants = $accessorGrants[ $method ];
			$requestAccess = $methodGrants[ $function ];
			
			if (isset($requestAccess['directive'])){
				$directive = $requestAccess['directive'];
			} else {
				$directive = $function;
			}
			
			$propertyDirectives = call_user_func( 
				SATANBARBARA_API_NAMESPACE . static::$_MANAGER . '::GetProperties',
				$requestAccess['permissions'],
				$directive
			);
			
			
			$usableFields = array_merge_recursive($requestAccess['fields'], $propertyDirectives);
			
			$fieldsFiltered = array_intersect_key($params, $usableFields);
						
			foreach($usableFields as $fieldName => $feildProperties){
				if (isset($feildProperties['default']) && !isset($fieldsFiltered[ $fieldName ])) {
					$fieldsFiltered[ $fieldName ] = $feildProperties['default'];
				}
				if (isset($feildProperties['required']) && !isset($fieldsFiltered[ $fieldName ])) {
					$missingRequired[] = $fieldName;
				}
			}
			
			if (count($missingRequired)){
				throw new Exception('Missing required fields: ' . implode(', ', $missingRequired) );
			}
			
			return $fieldsFiltered;
		}
	}
		