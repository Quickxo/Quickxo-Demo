<?php
/** @file XHRAjaxGetCommand.php
 * XHRAjaxGet Ajax controller
 * 
 * @brief XHRAjaxGet action class of the XHRAjaxGet Ajax controller
 */

/** @class AjaxGetCommand
 *  @brief Action class of the XHRAjaxGet view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class XHRAjaxGetCommand extends Command {

	/** 
	 * Include XHRAjaxGet view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		$envInfoName = isset($request['envInfoName']) ? $request['envInfoName'] : 'REQUEST_METHOD';   
		$serverEnvInfo = $_SERVER['' . $envInfoName . ''];		
		include(views_path . 'XHRAjaxGetView.php');
	}
} 