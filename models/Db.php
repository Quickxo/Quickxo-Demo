<?php

/** @file Db.php
 * The model: manage the connection with the database
 * Based on the Singleton design pattern
  * 
 * @brief Model class. Static class in order to instantiate only one connection once at the same time
*/

/** @class Db
 *  @brief Model static class: encapsulate the database connection logic
 *
 */
class Db{

/** 
* Declare the instance 
*/
	private static $instance = NULL;

/**
*
* the constructor is set to private so
* so nothing may create a new instance using 'new'
*
*/
	private function __construct() {
	/*** maybe set the db name here later ***/
	}
/**
* Return DB instance or create intitial connection
* @return object (PDO)
* 
*/
	public static function getInstance() {
		if (!self::$instance){
			try {
				self::$instance = new PDO('sqlite:' . models_path . 'Northwind.db');
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e) { 
				die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
			}
		}
		return self::$instance;
	}

/**
* Like the constructor, we make __clone private
* so nothing may clone the instance
*/
	private function __clone(){
	}
}
