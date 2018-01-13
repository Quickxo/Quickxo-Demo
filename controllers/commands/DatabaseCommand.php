<?php
/** @file DatabaseCommand.php
 * Default Database page
  * 
 * @brief Database action class of the Database view
*/

/** @class DatabaseCommand
 *  @brief Action class of the Database view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class DatabaseCommand extends Command {

/** 
* Include Database view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
    include(views_path . 'DatabaseView.php');
  }

} 