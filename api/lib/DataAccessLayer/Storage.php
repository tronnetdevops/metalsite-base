<?php
	/**
	 * @brief Storage Interface
	 *
	 * ## Overview
	 * This interface is responsible for ensuring records are saved to the correct
	 * persistency solution (ie, MySQL, cache, filesystem, etc.). It is also 
	 * responsible for unpacking objects and ensuring their data is delivered in
	 * the correct capacity to their respective persitency solution.
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class Storage {
		
		const MYSQL = 1;
		const MEMCACHED = 2;
		
		static public function Create( $method, $attrs, $ns, $key ){
			switch (strtolower($method)){
				case self::MYSQL:
					return MySQLConnector::Insert( $attrs, $key );
			}
		}
		
		static public function Update( $method, $id, $attrs, $ns, $key ){
			switch (strtolower($method)){
				case self::MYSQL:
					return MySQLConnector::Update( $id, $attrs, $key );
			}
		}
		
		static public function Delete( $method, $ids, $ns, $key ){
			if (!is_array($ids)){
				$ids = array($ids);
			}
			
			switch (strtolower($method)){
				case self::MYSQL:
					return MySQLConnector::Delete( $ids, $key );
			}
		}
		
		static public function FetchByIDs( $method, $ids, $fields, $associations, $ns, $key ){
			if (!is_array($ids)){
				$ids = array($ids);
			}
			
			if (is_string($fields)){
				$fields = array($fields);
			}
			
			switch (strtolower($method)){
				case self::MYSQL:
					return MySQLConnector::FetchByIDs( $ids, $key, $fields, $associations );
			}
		}
		
		static public function FetchAll( $method, $fields, $limit, $offset, $orderBy, $orderByDir, $groupBy, $criteria, $delineation, $operator, $associations, $start, $end, $ns, $key ){
			if (is_string($fields)){
				$fields = array($fields);
			}
			
			switch (strtolower($method)){
				case self::MYSQL:
					return MySQLConnector::FetchAll( $key, $fields, $limit, $offset, $orderBy, $orderByDir, $groupBy, $criteria, $delineation, $operator, $associations, $start, $end );
			}
		}
	}