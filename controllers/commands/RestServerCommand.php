<?php
/** @file RestServerCommand.php
 * Rest Server
 * 
 * @brief WebServices action class of the Rest Server
 */

function getServerInfo($envInfo) { 
	return '$_SERVER[\'' . $envInfo . '\'] = ' . $_SERVER['' . $envInfo . ''];
} 
 
 /** @class RestServerCommand
 *  @brief Action class of the Rest Server
 *
 * Override the doExecute($request) function to implement Rest Server logic
 */
class RestServerCommand extends Command {
	
	/** 
	 * Just run a simple Rest Server, without including 
	 * the view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		try {
			header("Content-Type:application/json");
	 		$status = 400;
			$status_message = "Invalid Request";
			$data = null;
			
			if (isset($request['envInfoName'])){
				$envInfoName = $request['envInfoName'];
				$data = getServerInfo($envInfoName);
				$status = 200;
				$status_message = "OK";
			}
			
			header("HTTP/1.1 " . $status);	
			$response['status'] = $status;
			$response['status_message'] = $status_message;
			$response['data'] = $data;
			$json_response = json_encode($response);
			echo $json_response;			
		}
		catch (Exception $e){ 
			die("RestServer error: " . $e->getMessage() . "<br/>");
		}
	}
} 