<?php
	/**
	 * @brief AJAX Interface
	 *
	 * ## Overview
	 * This interface is responsible to returning consumable data for API 
	 * requests as well as managing which methods are available to be envoked.
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class MySQLConnector {
		
	 	static private $_credentialsPath =  '/resources/db/mysql/sb.db.credentials.json';
	 	static private $_dbh;
		
		private static function _connect() {
			$credentials = json_decode(file_get_contents( SATANBARBARA_PATH . self::$_credentialsPath ), true);
			try {
				self::$_dbh = new \PDO(
					'mysql:host='. $credentials['creds']['host'] .';dbname='. $credentials['creds']['db'], 
					$credentials['creds']['username'], 
					$credentials['creds']['password']
				);
				
				self::$_dbh->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING );
			} catch (\PDOException $e) {
				/** 
				 * @todo Use primary logging system.
				 */
			    DebugHandler::Log('Connection failed: ' . $e->getMessage());
			    throw new Exception('MySQL failed to connect: ' . $e->getMessage());
			}
			return self::$_dbh;
		}
		
		public static function getHandle() {
			return (!isset(self::$_dbh)) ? self::_connect() : self::$_dbh;
		}
	
		static public function Insert($attrs, $table){
			$db = self::getHandle();
			
            $query = 'INSERT INTO `'. $table .'`';
            $names = array_keys($attrs);
            $values = array_values($attrs);
        
            if (!empty($names)) {
                // Add property name map
                $query .= ' (`'. implode($names, '`, `') . '`) ';
                // Add property value placeholders
                $query .= 'VALUES ('. implode(array_fill(0, count($names), '?'), ', ') . ')';
            }
            $statement = $db->prepare($query);
			
			$execution = @$statement->execute($values);
            if ($execution === false) {
                if ($statement->errorCode() == 23000) {
                    throw new Exception('Object name already exists in the "'.$table.'" database!' . var_export($statement->errorInfo(), true));
                } else {
                    throw new Exception('Couldn\'t save object to "'.$table.'" database! '. var_export($statement->errorInfo(), true));
                }
            }
        	
            if (!$id = $db->lastInsertId()) {
                throw new Exception('Couldn\'t get new object id from "'.$table.'" database! '. var_export($statement->errorInfo(), true));
			}

			
			return $id;
		}
		
		static public function Update($id, $attrs, $table){
			$db = self::getHandle();
			
			$values = array_values($attrs);
			
			$fieldList = '`'. implode(array_keys($attrs), "`=?, `") .'`=? ';
			
            $query = 'UPDATE `'. $table .'` SET '.$fieldList.' WHERE `id`=?';
			
			DebugHandler::Log($query);
			
            $statement = $db->prepare($query);
			
			$values[] = $id;
			
			$execution = $statement->execute($values);
            if ($execution === false) {
				// var_dump($query);
				// var_dump($values);
				//
                throw new Exception('Couldn\'t update object in "'.$table.'" table! '. var_export($statement->errorInfo(), true));
			}
			
			$attrs['id'] = $id;
			
			return true;
		}
		
		static public function Delete($ids, $table){
			$db = self::getHandle();
			
			$IDPlaceholders = implode( array_fill(0, count($ids), "`id`=?"), ' OR ');
			
			$query = 'DELETE FROM `'. $table .'` WHERE '. $IDPlaceholders;
			
            $statement = $db->prepare($query);
			
			$statement->execute($ids);
			
			$affected = $statement->rowCount();
			
			if (!$affected) {
				throw new Exception('No records matching the id set provided!');
			}

			return $affected;
		}
		
		static public function FetchByIDs($ids, $table, $fields, $associations = null){
			$db = self::getHandle();
			
			$IDPlaceholders = implode( array_fill(0, count($ids), "`id`=?"), ' OR ');
			
			$fieldsCondenced = '`' . implode($fields, '`, `') . '`';
			
			$query = 'SELECT '. $fieldsCondenced .' FROM `'. $table .'` WHERE '. $IDPlaceholders;
			
			DebugHandler::Log($query);
			
			$statement = $db->prepare($query);
			
			if ($statement->execute($ids) === false) {
				throw new Exception('Couldn\'t get object property '.$name.'! '. var_export($statement->errorInfo(), true));
			}

			return $statement->fetchAll(\PDO::FETCH_ASSOC|\PDO::FETCH_GROUP);	
			
		}
		
		static public function FetchAll($table, $fields, $limit, $offset, $orderBy = 'id', $orderByDir = 'ASC', $groupBy = 'id', $criteria = null, $delineation = null, $operator = null, $associations = null, $start = null, $end = null){
			$db = self::getHandle();
			$isCount = false;

			if ($groupBy == 'none'){
				$groupBy = null;
			}
			
			if (in_array('count', $fields)){
				$isCount = true;
				
				$fieldsCondenced = '`'.$table.'`.`id`';
				
				$countSubWrapBegin = 'SELECT COUNT(*) AS `total` FROM (';
				$countSubWrapEnd = ') `'.$table.'`';
				array_shift($fields);
			} else {
				$fieldsCondenced = '`'.$table.'`.`' . implode($fields, '`, `'.$table.'`.`') . '`';
				
				if ($groupBy){
					if (!in_array($groupBy, $fields)){
						if (!in_array('id', $fields)){
							$groupBy = $fields[0];
						} else {
							$groupBy = 'id';
						}
					}
				}

				if ($orderBy){
					if (!in_array($orderBy, $fields)){
						if (!in_array('id', $fields)){
							$orderBy = $fields[0];
						} else {
							$orderBy = 'id';
						}
					}
				}
			}
						
			if (empty($orderByDir) || $orderByDir != 'ASC' && $orderByDir != 'DESC'){
				$orderByDir = 'ASC';
			}
			
			$association = '';
			$where = 'WHERE ';
			$whereParams = array();
			$counter = 0;
			$bindParamKey = '';
			
			if (is_array($criteria)){
				foreach($criteria as $key => $value){
					if ($counter){
						switch($delineation){
							case 'and':
								$where .= ' AND ';
								break;
							case 'or':
								$where .= ' OR ';
								break;
						}
					}
					
					$bindParamKey = ':crit' . $counter++;
										
					switch ($operator){
						case 'like':
							$where .= ' `'.$table.'`.`'. $key .'` LIKE ' . $bindParamKey;
							$whereParams[ $bindParamKey ] = $value . '%';							
							break;
						
						case 'fuzzy':
							$where .= ' `'.$table.'`.`'. $key .'` LIKE ' . $bindParamKey;
							$whereParams[ $bindParamKey ] = '%' . $value . '%';							
							break;
						
						case 'eq':
							$where .= ' `'.$table.'`.`'. $key .'`=' . $bindParamKey;
							$whereParams[ $bindParamKey ] = $value;							
							break;
					} 
				}
			}
			
			if (is_array($associations)){
				foreach($associations as $key => $assocIdentity){
					
					$association = ' LEFT JOIN `' . $assocIdentity['to']['key'] .
						'` ON `' . $assocIdentity['from']['key'] .'`.`'. $assocIdentity['from']['field'] .
							'` = `' .  $assocIdentity['to']['key'] .'`.`'. $assocIdentity['to']['field'] .'`';
					
					foreach($assocIdentity['fields'] as $field){
						$fieldsCondenced .= ', '. '`'.$assocIdentity['to']['key'].'`.`' . $field .
							'` AS `'. $key .'_'. $field . '`';
					}
				}
			}
			
			if ($start){
				$bindParamKey = ':crit' . $counter++;
				if (count($whereParams)){
					$where .= ' AND ';
				}
				$where .= '`'.$table.'`.`date` > ' . $bindParamKey;
				$whereParams[ $bindParamKey ] = $start;		
			}
			
			if ($end){
				$bindParamKey = ':crit' . $counter++;
				if (count($whereParams)){
					$where .= ' AND ';
				}
				$where .= '`'.$table.'`.`date` < ' . $bindParamKey;
				$whereParams[ $bindParamKey ] = $end;		
			}
			
			if (!count($whereParams)){
				$where = '';
			}
			
			if ($orderBy){
				$orderQuery = ' ORDER BY `'.$table.'`.`'.$orderBy.'` '.$orderByDir.' ';
			} else {
				$orderQuery = '';
			}
			
			if ($groupBy){
				$groupQuery = ' GROUP BY `'.$table.'`.`'.$groupBy.'` ';
			} else {
				$groupQuery = '';
			}
			
			$query = 'SELECT '. $fieldsCondenced .' FROM `'. $table .'` '.$association.' '.$where . $groupQuery . $orderQuery .' LIMIT :lim OFFSET :ofs';
			
			if ($isCount){
				$query = $countSubWrapBegin . $query . $countSubWrapEnd;
			}
			
			DebugHandler::Log($query);
			
			$statement = $db->prepare($query);
			
			$statement->bindValue(':lim', (int) $limit, \PDO::PARAM_INT);
			$statement->bindValue(':ofs', (int) $offset, \PDO::PARAM_INT);
			
			DebugHandler::Log(var_export( $whereParams, true));
			
			foreach($whereParams as $paramName => $paramValue){
				$statement->bindValue($paramName, $paramValue);
			}
						
			if ($statement->execute() === false) {
				/**
				 * @todo make better error
				 */
				throw new Exception('There was a problem with the search query! '. var_export($statement->errorInfo(), true));
			}
						
			return $statement->fetchAll(\PDO::FETCH_ASSOC|\PDO::FETCH_GROUP);	
			
		}
		
		
	}
	