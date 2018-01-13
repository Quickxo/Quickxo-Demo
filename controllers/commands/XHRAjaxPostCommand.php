<?php
/** @file XHRAjaxPostCommand.php
 * XHRAjaxPost Ajax controller
 * 
 * @brief XHRAjaxPost action class of the XHRAjaxPost Ajax controller
 */

/** @class AjaxPostCommand
 *  @brief Action class of the XHRAjaxPost view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class XHRAjaxPostCommand extends Command {

	/** 
	 * Include XHRAjaxPost view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		$serverEnvInfo = "";
		if(!empty($request['check_list'])) {
			foreach($request['check_list'] as $envInfoName) {
				$serverEnvInfo .= $envInfoName . ": " . $_SERVER['' . $envInfoName . ''] . "\n";
			}
		}	
		include(views_path . 'XHRAjaxPostView.php');
	}
} 