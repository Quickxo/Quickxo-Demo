<?php
/** @file HomeCommand.php
 * Default Home page
  * 
 * @brief Home action class of the Home view
*/

/** @class HomeCommand
 *  @brief Action class of the Home view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class HomeCommand extends Command {

/** 
* Include Home view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
    include(views_path . 'HomeView.php');
  }

} 