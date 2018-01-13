<?php
/** @file XHRPaginationCommand.php
 * XHRPagination Ajax controller
 * 
 * @brief XHRPagination action class of the XHRPagination Ajax controller
 */

/** @class XHRPagination
 *  @brief Action class of the XHRPagination view
 *
 * Override the doExecute($request) function to implement view specific logic 
 */
class XHRPaginationCommand extends Command {

	/** 
	 * Include XHRPagination view HTML code to be returned to the client's browser
	 */
	public function doExecute($request) {
		$salesYear = isset($request['salesYear']) ? $request['salesYear'] : '1996'; 
		$pageNumber = isset($request['pageNumber']) ? $request['pageNumber'] : '1'; 
		$salesOffset = (10 * $pageNumber) - 10;		
		$salesByYears = new SalesByYears(); 
		$nbSales = $salesByYears->getNumberOfSales($salesYear);
		$pagination = new Pagination($nbSales, 10, $pageNumber);
		$resultList = $salesByYears->getSalesByOffset($salesYear, $salesOffset);
		include(views_path . 'XHRPaginationView.php');
	}
} 