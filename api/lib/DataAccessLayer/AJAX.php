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

	abstract class AJAX {

		static public function Response($method = "json", $data = array(), $statusCode = 0, $statusMessage = "Success!") {
			switch($method){
				case "json":
				default:
					echo json_encode(array(
						"data" => $data,
						"status" => array(
							"code" => $statusCode,
							"message" => $statusMessage
						)
					));
					break;
			}
			return 1;
		}
	}