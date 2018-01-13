<?php
/** @file AjaxPostCommand.php
 * AjaxPost page
 * 
 * @brief AjaxPost action class of the AjaxPost view
 */

/** @class AjaxPostCommand
 *  @brief Action class of the AjaxPost view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class AjaxPostCommand extends Command {

	/** 
	 * Include AjaxPost view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		include(views_path . 'AjaxPostView.php');
	}
} 