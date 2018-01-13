<?php

// commands directory path
// site_path is defined in index.php front page
$commands_path = site_path . 'controllers' . DIRSEP . 'commands' . DIRSEP; 
if (is_dir($commands_path) == false) {
	throw new Exception ('Invalid commands path: `' . $commands_path . '`');
}
define ('commands_path', $commands_path);

// classes directory path
// site_path is defined in index.php front page
$classes_path = commands_path . 'classes' . DIRSEP; 
if (is_dir($classes_path) == false) {
	throw new Exception ('Invalid helper classes path: `' . $classes_path . '`');
}
define ('classes_path', $classes_path);

// views directory path
$views_path = site_path . 'views' . DIRSEP; 
if (is_dir($views_path) == false) {
	throw new Exception ('Invalid views path: `' . $views_path . '`');
}
define ('views_path', $views_path);

// controller directory path
$controllers_path = site_path . 'controllers' . DIRSEP; 
if (is_dir($controllers_path) == false) {
	throw new Exception ('Invalid controllers path: `' . $controllers_path . '`');
}
define ('controllers_path', $controllers_path);

// model directory path
$models_path = site_path . 'models' . DIRSEP; 
if (is_dir($models_path) == false) {
	throw new Exception ('Invalid models path: `' . $models_path . '`');
}
define ('models_path', $models_path);

// Check front controller file existence
if(file_exists(controllers_path . 'Controller.php') == false) {
	throw new Exception ('File not found: `' . controllers_path . 'Controller.php' . '`');
}

// Check model file existence
if(file_exists(models_path . 'Db.php') == false) {
	throw new Exception ('File not found: `' . models_path . 'Db.php' . '`');
}

// Check abstract command class  controller file existence
if(file_exists(commands_path . 'Command.php') == false) {
	throw new Exception ('File not found: `' . commands_path . 'Command.php' . '`');
}

// Register the classes path
function Autoloader($className)
{
	$models_file_name = models_path.$className.'.php';
	if(file_exists($models_file_name)) {
		include_once $models_file_name;
	}
	
	$classes_file_name = classes_path.$className.'.php';
	if(file_exists($classes_file_name)) {
		include_once $classes_file_name;
	}	
}
spl_autoload_register('Autoloader');

