<?php
/** @file SoapCommand.php
 * Soap page
  * 
 * @brief Soap action class of the Soap view
*/

/** @class SoapCommand
 *  @brief Action class of the Soap view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class SoapCommand extends Command {

/** 
* Include Soap view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
	$soapResponse = "";
	$envInfoName = "";
	$requestHeaders = "";
	$requestContent = "";
	$responseHeaders = "";
	$responseContent = "";
	$envInfoName = (isset($request['envInfoName'])) ? $request['envInfoName'] : "REQUEST_METHOD"; 
	if (isset($request['envInfoName'])){
		$client = new SoapClient(null, array(
		'location' => 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?command=SoapServer',
		'uri'      => "urn:MyNamespace",
		'trace'    => 1 ));	
		$soapResponse = $client->__soapCall("getServerInfo", array($envInfoName));
		$requestHeaders = "\nDumping request headers:\n\n" . $client->__getLastRequestHeaders();
		$requestContent = "\nDumping request:\n\n" . $client->__getLastRequest();
		$responseHeaders = "\nDumping response headers:\n\n" . $client->__getLastResponseHeaders();
		$responseContent = "\nDumping response:\n\n" . $client->__getLastResponse();
	}
	
    include(views_path . 'SoapView.php');
  }
} 