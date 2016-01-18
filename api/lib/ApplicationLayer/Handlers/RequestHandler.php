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

	abstract class RequestHandler {
	    /**
	     * Class Properties
	     */
    
	    /**#@+
	     * @static
	     * @access public
	     */
    
	    /**
	     * @var String
	     */
		static public $key = 'MetalsiteAPI';
	
	    /**#@-*/
    
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
    
	    /**
	     * @brief Initializes the API Request Process.
	     *
	     * ## Overview
	     * This will parse various request parameters and attemp to call the 
		 * respective action on an object controller.
	     *
	     * @uses spl_autoload_register()
	     * @see index.php
	     *
	     * @return {Null} Always unless fatal error or exception is thrown.
	     *
	     * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	     * @date 02/19/2014
	     */
		static public function Init($params = null){
			
			try{
				if (count($_POST)) { // Auth always required
					$method = 'post';
					$params = $_POST;
				} else { // Some auth may be required
					$method = 'get';
					$params = $_GET;
				}
				
				DebugHandler::Log(var_export( $params, true));
				DebugHandler::Log(var_export( $method, true));
				DebugHandler::Log(var_export( $_SERVER['REQUEST_URI'], true));
				$noGet = explode('?', $_SERVER['REQUEST_URI']);
				
				
				$delReqParams = explode('/', $noGet[0]);
				
				DebugHandler::Log(var_export( $delReqParams, true));
				array_shift($delReqParams);
				
				DebugHandler::Log(var_export( $delReqParams, true));
				if (isset($delReqParams[0]) && !empty($delReqParams[0])){
					$params['_action'] = $delReqParams[0];
					
					if (isset($delReqParams[1]) && !empty($delReqParams[1])){
						$params['_target'] = $delReqParams[1];
						array_shift($delReqParams);
					}
				}
				
				if (!isset($params['_target'])){
					throw new Exception('No target was provided');
				}
				
				DebugHandler::Log(var_export( $params, true));
				
				$className = $params['_target'];
				$action = $params['_action'];
				$controller = $className . 'Controller';
				
				DebugHandler::Log(var_export( SATANBARBARA_API_NAMESPACE . $controller.'::ValidRequestMethod::'.$action, true));

				if (call_user_func(SATANBARBARA_API_NAMESPACE . $controller.'::ValidRequestMethod', $method, $action)){
					$filteredParams = call_user_func(SATANBARBARA_API_NAMESPACE . $controller.'::FilterParams', $method, $action, $params);
					$data = call_user_func(SATANBARBARA_API_NAMESPACE . $controller.'::'.$action, $filteredParams);
				} else {
					throw new Exception('This action cannot be envoked through the get method!');
				}
				
				AJAX::Response('json', $data);
				
			} catch(Exception $e){
				AJAX::Response('json', array(), 1, $e->getMessage());
			}
		}

	    /**#@-*/
	}