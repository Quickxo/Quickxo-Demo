<?php
/** @file AjaxGetCommand.php
 * AjaxGet page
 * 
 * @brief AjaxGet action class of the AjaxGet view
 */

/** @class AjaxGetCommand
 *  @brief Action class of the AjaxGet view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class AjaxGetCommand extends Command {

	/** 
	 * Include AjaxGet view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		include(views_path . 'AjaxGetView.php');
	}
} 