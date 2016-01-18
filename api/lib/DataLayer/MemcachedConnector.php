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

	abstract class MemcachedConnector {
		
	 	static private $_credentialsPath =  '/resources/db/memcached/mvr.memcached.credentials.json';
	 	static private $_dbh;
		
		private static function _connect() {
			$credentials = json_decode(file_get_contents( SATANBARBARA_PATH . self::$_credentialsPath ), true);
			try {
				$dbh = self::$_dbh = new \Memcached();
				
				$m->addServer('localhost', 11211);
				// $m->addServer($credentials['creds']['host'], $credentials['creds']['port']);
			} catch (\PDOException $e) {
				/** 
				 * @todo Use primary logging system.
				 */
			    DebugHandler::Log('Connection failed: ' . $e->getMessage());
			    throw new Exception('MySQL failed to connect: ' . $e->getMessage());
			}
			
			return $dbh;
		}
		
		public static function getHandle() {
			return (!isset(self::$_dbh)) ? self::_connect() : self::$_dbh;
		}