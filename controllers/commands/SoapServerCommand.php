<?php
/** @file SoapServerCommand.php
 * Soap Server
 * 
 * @brief WebServices action class of the Soap Server
 */

function getServerInfo($envInfo) { 
	return '$_SERVER[\'' . $envInfo . '\'] = ' . $_SERVER['' . $envInfo . ''];
} 
 
 /** @class SoapServerCommand
 *  @brief Action class of the Soap Server
 *
 * Override the doExecute($request) function to implement Soap Server logic
 */
class SoapServerCommand extends Command {
	
	/** 
	 * Just run native PHP Soap Server, without including 
	 * the view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		try {
			$server = new SoapServer(null, array('uri' => "urn:MyNamespace"));
			$server->addFunction("getServerInfo"); 
			$server->handle();
		}
		catch (Exception $e) { 
			die("SoapServer error: " . $e->getMessage() . "<br/>");
		}
	}
} 