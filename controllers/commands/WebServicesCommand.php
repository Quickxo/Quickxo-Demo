<?php
/** @file WebServicesCommand.php
 * Default WebServices page
  * 
 * @brief WebServices action class of the WebServices view
*/

/** @class WebServicesCommand
 *  @brief Action class of the WebServices view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class WebServicesCommand extends Command {

/** 
* Include WebServices view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
    include(views_path . 'WebServicesView.php');
  }
} 