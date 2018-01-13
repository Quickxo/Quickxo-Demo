<?php
/** @file Error404Command.php
 * Error 404 page of the website
  * 
 * @brief Error 404 action class of the Error 404 view
*/

/** @class Error404Command
 *  @brief Action class of the Error404 view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class Error404Command extends Command {

/** 
* Include Error404 view HTML code to be returned to the client's browser
*/
  function doExecute($request) {
    include(views_path . 'Error404View.php');
  }
}