<?php
/** @file MethodPostCommand.php
 * MethodPost page
 * 
 * @brief MethodPost action class of the MethodPost view
 */

/** @class MethodPostCommand
 *  @brief Action class of the MethodPost view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class MethodPostCommand extends Command {

	/** 
	 * Include MethodPost view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		$serverEnvInfo = "";
		if(!empty($request['check_list'])) {
			foreach($request['check_list'] as $envInfoName) {
				$serverEnvInfo .= $envInfoName . ": " . $_SERVER['' . $envInfoName . ''] . "\n";
			}
		}	
		include(views_path . 'MethodPostView.php');
	}
} 