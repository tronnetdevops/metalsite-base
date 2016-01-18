<?php
	/**
	 * @brief Base Manager for managing Objects.
	 *
	 * ## Overview
	 *
	 * @todo Move Storage calls to BaseEntity
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class BaseManager {
		
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
    
	    /**@* {String} Name of database. */
		static protected $_STORAGE_NAMESPACE = "satanbarbara";
		
		static protected $attrs;
		
		static protected $objects;	
	    /**#@-*/
		
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
		
		static protected $defaultFindData = array(
			'ids' => array(-1),
			'fields' => '*',
			'limit' => 100000,
			'offset' => 0,
			'orderBy' => 'id',
			'orderByDir' => 'ASC',
			'groupBy' => 'id',
			'criteria' => null,
			'delineation' => null,
			'operator' => null
		);
		
		static public function Find($data){
			$obj = SATANBARBARA_API_NAMESPACE . static::$_ENTITY;
			
			$manager = SATANBARBARA_API_NAMESPACE . static::$_ENTITY . 'Manager';
			
			$params = array_merge(self::$defaultFindData, $data);
			
			$Objects = array();
			
			$matches = call_user_func_array($manager.'::Fetch', $params);
			
			foreach($matches as $match){
				$id = $match['id'];
				
				if (!isset(self::$objects[ $id ])){
					static::$objects[ $id ] = new $obj($match);		
				}
				
				$Objects[ $match['id'] ] = self::Get( $id );
			}
			
			return $Objects;
		}
		
		static public function Get($IDList){
			if (!is_array($IDList)){
				$IDList = explode(',', $IDList);
			}
			
			$Objects = array();
			
			foreach($IDList as $id){
				if (!isset(static::$objects[ $id ])){
					self::Find( array('id' => $id ) );
				}
				
				$Objects = static::$objects[ $id ];
			}
			
			return $Objects;
		}
		
		static public function Save(BaseEntity $object){
			$properties = $object->GetValues(null, true, true);
			
			if (isset($properties['id'])){
				$id = $properties['id'];
				
				unset($properties['id']);
				
				$values = Storage::Update(
					Storage::MYSQL,
					$id,
					$properties, 
					self::$_STORAGE_NAMESPACE, 
					static::$_KEY
				);
			} else {
				$id = Storage::Create(
					Storage::MYSQL, 
					$properties, 
					self::$_STORAGE_NAMESPACE, 
					static::$_KEY
				);
				
				$object->SetValue('id', $id);
			}
			
			if (!isset(static::$objects[ $id ])){
				static::$objects[ $id ] = $object;			
			}
			
			return true;
		}
		
		static public function Create($properties){
			$obj = SATANBARBARA_API_NAMESPACE . static::$_ENTITY;
			
			$filteredValues = static::Filter( $properties );
			
			static::Validate( $filteredValues );
			
			if (isset($filteredValues['id'])){
				$id = $filteredValues['id'];
				unset($filteredValues['id']);
				
				$Object = self::Find( $id );
			
				if (count($filteredValues)){
					$Object->SetValues($filteredValues);
					$Object->Save();
				}
			} else {
				$Object = new $obj($filteredValues);
				$Object->Save();
			}

			return $Object;
			
		}
		
		static public function Fetch($ids = array(-1), $fields = array('*'), $limit = 20, $offset = 0, $orderBy = 'id', $orderByDir = 'ASC', $groupBy = 'id', $criteria = null, $delineation = null, $operator = null) {
			$obj = SATANBARBARA_API_NAMESPACE . static::$_ENTITY;
			$objSet = array();
			$mergers = array();
			$results = array();	
			$visible = array_keys(self::GetProperties( BaseEntity::EAP_READ_ONLY ));
			
			$start = $end = null;
			
			if (!is_array($ids)){
				$ids = explode(',', $ids);
			}
			
			if (!is_array($fields)){
				$fields = explode(',', $fields);
			}
			
			/**
			 * @todo maybe make this more smart and search the array and slice, instead of first index
			 */
			if (in_array('*', $fields)) {
				$filteredFields = $visible;
			} else if (in_array('count', $fields)) {
				$filteredFields = $fields;
			} else {
				$filteredFields = array_intersect($fields, $visible);
			
				if (!count($filteredFields)){
					$filteredFields = $visible;
				}
			}
			
			
			if (isset($criteria)){
				if (isset($criteria['dateStart'])){
					$start = $criteria['dateStart'];
				}
				if (isset($criteria['dateEnd'])){
					$end = $criteria['dateEnd'];
				}
				$filteredCriteria = static::Filter( $criteria );
			} else {
				$filteredCriteria = null;
			}
			
			if (isset(static::$mergers) && in_array("mergers", $fields)){
				unset($fields[ array_search("mergers", $fields) ]);
				
				foreach(static::$mergers as $entity => $merger){
					if ($merger['fields'] == '*'){
						$manager = SATANBARBARA_API_NAMESPACE . $entity . 'Manager';
						
						$propertyDirectives = call_user_func( 
							$manager . '::GetProperties',
							BaseEntity::EAP_READ_ONLY
						);
						
						$merger['fields'] = array_keys($propertyDirectives);
					}
					
					$mergers[ $entity ] = $merger;
				}
			}
			
			if ($ids[0] == -1){
				$resultSet = Storage::FetchAll( 
					Storage::MYSQL, 
					$filteredFields,
					$limit,
					$offset,
					$orderBy,
					$orderByDir,
					$groupBy,
					$filteredCriteria,
					$delineation,
					$operator,
					$mergers,
					$start,
					$end,
					self::$_STORAGE_NAMESPACE, 
					static::$_KEY
				);
				
				DebugHandler::Log(var_export( $resultSet, true));
				foreach(array_keys($resultSet) as $id){
					$results[ $id ] = $resultSet[$id][0];
					$results[ $id ]['id'] = $id;
				}
			} else {
				$resultSet = Storage::FetchByIDs( 
					Storage::MYSQL, 
					$ids, 
					$filteredFields,
					$mergers,
					self::$_STORAGE_NAMESPACE, 
					static::$_KEY
				);
				
				DebugHandler::Log(var_export( $resultSet, true));
				foreach(array_keys($resultSet) as $id){
					$results[ $id ] = $resultSet[$id][0];
					$results[ $id ]['id'] = $id;
				}
			}				
			
			
			DebugHandler::Log(var_export( $results, true));
			return $results;
		}
		
		static public function Delete($ids){

			if (!is_array($ids)){
				$ids = explode(',', $ids);
			}

			foreach($ids as $id){
				if (isset(self::$objects[ $id ])){
					unset(self::$objects[ $id ]);
				}
			}

			$deleted = Storage::Delete(
				Storage::MYSQL,
				$ids,
				self::$_STORAGE_NAMESPACE,
				static::$_KEY
			);

			return $deleted;
		}
		
		static public function GetAssoc($name, $to, $from){
			$fields = array();
			
			if (isset(static::$association[ $name ])){
				$association = static::$associations[$name];
			} else {
				return array();
			}
			
			$fields[ $association['to']['binder'] ] = $to;
			$fields[ $association['from']['binder'] ] = $from;
						
			Storage::Create(
				Storage::MYSQL, 
				$fields, 
				self::$_STORAGE_NAMESPACE, 
				static::$_KEY
			);
		}
		
		static public function GetProperties($level, $directive = null) {
			$properties = array();
			$obj = SATANBARBARA_API_NAMESPACE . static::$_ENTITY;
			$entityProperties = $obj::GetProperties();
			
			foreach($entityProperties as $name=>$params){
				if ($params['permissions'] >= $level){
					if ($directive && isset($params['directives']) && isset($params['directives'][ $directive ])){
						$properties[$name] = $params['directives'][ $directive ];
					} else {
						$properties[$name] = array();
					}
				}
			}
			
			return $properties;
		}
		
		static public function Validate($values, $checkRequired = true) {
			$attrs = self::GetProperties( BaseEntity::EAP_READ_ONLY );
			
			/**
			 * @todo Utilize property's 'directives' to determine if required in this scenario.
			 * EDIT - Do this during SAVE operation instead of validate
			 */
			// if ($checkRequired){
			// 	$missingRequired = array_diff(static::$required, array_keys($values));
			//
			// 	if (count($missingRequired)){
			// 	                throw new Exception('The following fields are missing: ' . implode(', ', $missingRequired) );
			// 	}
			// }
			
			if (isset(static::$attrs)){
				foreach($values as $key => $value){
					if (isset(static::$attrs[ $key ]['validation'])){
						/**
						 * @todo Provide abilityt to reference custom methods
						 */
						$validationFunction = static::$attrs[ $key ]['validation'];
						if (!$validationFunction( $value )){
			                throw new Exception('Validation "'.$validationFunction.'" for "'. $key .'" is invalid!');
						}
					}
				}
			}
			
			return true;
		}
		
		static public function Filter($values) {
			$attrs = self::GetProperties( BaseEntity::EAP_READ_ONLY );
			
			$filteredValues = array();
			foreach($values as $key => $value){
				if (isset($attrs[ $key ])){
					/** 
					 * @todo At this point, check for filters if available 
					 */
					$filteredValues[ $key ] = $value;
				}
			}
			return $filteredValues;
		}
				
	    /**#@-*/
	}