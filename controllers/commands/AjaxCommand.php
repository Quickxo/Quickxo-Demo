<?php
/** @file AjaxCommand.php
 * Ajax page
 * 
 * @brief Ajax action class of the Ajax view
 */

/** @class AjaxCommand
 *  @brief Action class of the Ajax view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class AjaxCommand extends Command {

/** 
* Include Ajax view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
    include(views_path . 'AjaxView.php');
  }

} 