<?php
/** @file DatabaseSimpleCommand.php
 * Default DatabaseSimple page
 * 
 * @brief DatabaseSimple action class of the DatabaseSimple view
*/

/** @class DatabaseSimpleCommand
 *  @brief Action class of the DatabaseSimple view
 *
 * Override the doExecute($request) function to implement view specific logic
 */
class DatabaseSimpleCommand extends Command {

/** 
* Include DatabaseSimple view HTML code to be returned to the client's browser
*/
	public function doExecute($request) {
		$queryName = isset($request['queryName']) ? $request['queryName'] : 'ALL_PRODUCTS'; 
		$resultList = [];
		switch($queryName){
			case "DISCONTINUED_PRODUCTS":
				$product = new Product();
				$resultList = $product->getDiscontinuedProducts();
				break;
			case "CURRENT_PRODUCTS":
				$product = new Product();
				$resultList = $product->getCurrentProducts();
				break;
			case "ALL_PRODUCTS":
				$product = new Product();
				$resultList = $product->getAllProducts();
				break;
			default:
				$product = new Product();
				$resultList = $product->getAllProducts();
				break;
		}
		include(views_path . 'DatabaseSimpleView.php');
	}
} 