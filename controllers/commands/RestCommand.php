<?php
/** @file RestCommand.php
 * Rest page
 * 
 * @brief WebServices action class of the WebServices view
*/

/** @class RestCommand
 *  @brief Action class of the Rest view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class RestCommand extends Command {

/** 
* Include Rest view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
	$restResponse = "";
	$restStatus = "";
	$restStatusMessage = "";
	$envInfoName = "";
	$info = "";
	$envInfoName = (isset($request['envInfoName'])) ? $request['envInfoName'] : "REQUEST_METHOD"; 
	if (isset($request['envInfoName'])){  
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?command=RestServer';
		$client = curl_init();
		$data = array('envInfoName' => $envInfoName);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($client, CURLOPT_URL, $url);
		curl_setopt($client, CURLOPT_POST, 1);
		curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		curl_setopt($client, CURLINFO_HEADER_OUT, 1);
		$response = curl_exec($client);
		$result = json_decode($response);	
		$restResponse = $result->data; 
		$restStatus = $result->status;
		$restStatusMessage = $result->status_message;
		$info = curl_getinfo($client); 
		curl_close($client);
	}
	
    include(views_path . 'RestView.php');
  }
} 