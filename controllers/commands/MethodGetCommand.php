<?php
/** @file MethodGetCommand.php
 * MethodGet page
 * 
 * @brief MethodGet action class of the MethodGet view
 */

/** @class MethodGetCommand
 *  @brief Action class of the MethodGet view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class MethodGetCommand extends Command {

	/** 
	 * Include MethodGet view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		$envInfoName = isset($request['envInfoName']) ? $request['envInfoName'] : 'REQUEST_METHOD';   
		$serverEnvInfo = $_SERVER['' . $envInfoName . ''];
		include(views_path . 'MethodGetView.php');
	}
} 