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
		
	abstract class AccountController extends BaseController {
		
		static protected $_ENTITY = 'Account';
		static protected $_MANAGER = 'AccountManager';
		
		static protected $_request_access = array(
			'get' => array(
				'ValidateLogin' => array(
					'permissions' => BaseEntity::EAP_READ_ONLY,
					'fields' => array(
						'password' => array(
							'required' => true
						), 
						'email' => array(
							'default' => NULL
						),
						'username' => array(
							'default' => NULL
						)
					),
				), 
			)
		);
		
		static public function ValidateLogin($params){
			$params = self::FilterParams('get', 'ValidateLogin', $params);
			
			if (isset($params['email'])){
				$values = self::Search(array('email' => $params['email'], 'fields' => 'id,password'));
			} else if (isset($params['username'])){
				$values = self::Search(array('username' => $params['username'], 'fields' => 'id,password'));
			} else {
				throw new Exception('Must provide an email or username!');
			}
			
			if (count($values)){
				$match = reset($values);
				
				if ($match['password'] == $params['password']){
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		
			return false;
		}
				
	}
