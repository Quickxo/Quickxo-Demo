<?php
/** @file RequestMethodsCommand.php
 * RequestMethods page
  * 
 * @brief RequestMethods action class of the RequestMethods view
*/

/** @class RequestMethodsCommand
 *  @brief Action class of the RequestMethods view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class RequestMethodsCommand extends Command {

/** 
* Include RequestMethods view HTML code to be returned to the client's browser
*/
  public function doExecute($request) {
    include(views_path . 'RequestMethodsView.php');
  }

} 