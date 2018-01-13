<?php
/** @file Command.php
 * @brief Main abstract action class from which all action classes are overridden
*/

/** @class Command
 *  @brief Core abstract class
 *
 * The execute() function is called in each sub-command class and contains the logic to manage cookieless sessions and locale I18n settings. \n
 * The abstract function doExecute($request) is overridden for the own needs of each sub-command classes.
 */
abstract class Command {

//The constructor
/**
* Initialises variables
*
*/	
	final function __construct() { 
	}

/**
* Operate the requested Url string
* @param $request string: the requested URL
*/	
	final function execute($request) {		
		// Forward the action to execute page-specific logic
		$this->doExecute($request);
	}
     
/**
* Abstract function used by pages command classes to implement page specific logic depending of client request
* @param $request string: the requested URL
*/	
	abstract function doExecute($request);
}