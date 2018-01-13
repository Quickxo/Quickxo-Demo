<?php
/** @file Controller.php
 * Front controller
  * 
 * @brief Front controller. Parses the commands included in the URL
*/

/** @class Controller
 *  @brief Front controller static class.
 *
 * The URL contains the Action-View command to instantiate to process the corresponding view 
 * Contains also a second mecanism (after the one processed by "ErrorDocument 404" directive of the .htaccess Apache file) to generate a 404 error page
 */
class Controller {

/** 
* Static function to instantiate the front controller
* Get the requested command from the URL to parse it
*/
  public static function Run() {
	$command = isset($_REQUEST['command']) ? self::getCommand($_REQUEST['command']) : self::getCommand('');
    $command->execute($_REQUEST);
  }

/** 
* Parser of the front controller. Locate the command file, include it and instantiate the corresponding Action-View class
*/
  public static function getCommand($command) {
    //Secure setting. Without this line, it would let a user view all files that are readable by the webserver user that start with an uppercase (by appending "Command" and ".php" to the file before inclusion, but that won't matter as soon as a Unix nul string terminator at the end of the string is sent).
    $command = preg_replace('/[^a-zA-Z0-9]/', '', $command);
	
	// todo: hacking attemps location is here -> to check
	
	// Invoquing only the domain name of the website redirect to HomeView
	if ($command == ''){
		$command = "home";
	}
	
	// Uppercase of the first letter of the command name (convention)
    $commandClass = ucfirst($command) . 'Command';
	
	// Define the full path of the corresponding command file
    $commandFile  = commands_path . $commandClass . '.php';

    if(file_exists($commandFile)) {
      include($commandFile);
	  
	  // Instantiate the choosen command contained in the command file
      if(class_exists($commandClass)) {
        return new $commandClass();
      }
    }

	// Raise an error 404 if the requested command does not have any corresponding command class
    include(commands_path . 'Error404Command.php');
    return new Error404Command();
  }
}