<?php
/** @file DatabaseMultipleCommand.php
 * Default DatabaseMultiple page
 * 
 * @brief DatabaseMultiple action class of the DatabaseMultiple view
 */

/** @class DatabaseMultipleCommand
 *  @brief Action class of the DatabaseMultiple view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class DatabaseMultipleCommand extends Command {

	/** 
	* Include DatabaseMultiple view HTML code to be returned to the client's browser
	*/
	public function doExecute($request) {
		$salesYear = isset($request['salesYear']) ? $request['salesYear'] : '1996';  
		$salesByYears = new SalesByYears(); 
		$nbSales = $salesByYears->getNumberOfSales($salesYear); 
		$pagination = new Pagination($nbSales, 10, 1);
		$resultList = $salesByYears->getSalesByOffset($salesYear, 0);
		include(views_path . 'DatabaseMultipleView.php');
	}

} 