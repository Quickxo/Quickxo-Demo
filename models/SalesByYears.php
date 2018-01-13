<?php
class SalesByYears {
	private $db;

	public function __construct() {
		$this->db = Db::getInstance();
	}

	public function getSales($year) {
		$res = [];
		
		// check if the parameter is an integer
		if (ctype_digit($year)){
			$sql =  ' select ';
			$sql .= ' strftime("%Y-%m-%d", Orders.OrderDate) AS SaleDate, ';
			$sql .= ' Products.ProductName, ';
			$sql .= ' OrderDetails.UnitPrice, ';
			$sql .= ' OrderDetails.Quantity, ';
			$sql .= ' ROUND(OrderDetails.Discount*100) AS Discount, ';
			$sql .= ' ROUND(OrderDetails.UnitPrice*Quantity*(1-Discount)) AS ExtendedPrice ';
			$sql .= ' FROM Products ';
			$sql .= ' INNER JOIN OrderDetails ';
			$sql .= ' ON Products.ProductID = OrderDetails.ProductID ';
			$sql .= ' INNER JOIN Orders ';
			$sql .= ' ON Orders.OrderID = OrderDetails.OrderID ';
			$sql .= ' WHERE strftime("%Y", Orders.OrderDate) = "' . $year . '" ';
			$sql .= ' ORDER BY Orders.OrderDate ASC; ';
			try {
				$req = $this->db->query($sql);
				$res = $req->fetchAll(PDO::FETCH_ASSOC);				
			}
			catch (PDOException $e) { 
				die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
			}
		}
		
		return $res;
	}	

	public function getNumberOfSales($year) {
		$res = 0;
		
		// check if the parameter is an integer
		if (ctype_digit($year)){
			$sql =  ' select COUNT(*) ';
			$sql .= ' FROM Products ';
			$sql .= ' INNER JOIN OrderDetails ';
			$sql .= ' ON Products.ProductID = OrderDetails.ProductID ';
			$sql .= ' INNER JOIN Orders ';
			$sql .= ' ON Orders.OrderID = OrderDetails.OrderID ';
			$sql .= ' WHERE strftime("%Y", Orders.OrderDate) = "' . $year . '" ';
			$sql .= ' ORDER BY Orders.OrderDate ASC; ';
			try {
				$req = $this->db->query($sql);
				$res = $req->fetchColumn(0);				
			}
			catch (PDOException $e) { 
				die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
			}
		}
		
		return $res;
	}	
	
	public function getSalesByOffset($year, $offset) {
		$res = [];
		
		$sql =  ' select ';
		$sql .= ' strftime("%Y-%m-%d", Orders.OrderDate) AS SaleDate, ';
		$sql .= ' Products.ProductName, ';
		$sql .= ' OrderDetails.UnitPrice, ';
		$sql .= ' OrderDetails.Quantity, ';
		$sql .= ' ROUND(OrderDetails.Discount*100) AS Discount, ';
		$sql .= ' ROUND(OrderDetails.UnitPrice*Quantity*(1-Discount)) AS ExtendedPrice ';
		$sql .= ' FROM Products ';
		$sql .= ' INNER JOIN OrderDetails ';
		$sql .= ' ON Products.ProductID = OrderDetails.ProductID ';
		$sql .= ' INNER JOIN Orders ';
		$sql .= ' ON Orders.OrderID = OrderDetails.OrderID ';
		$sql .= ' WHERE strftime("%Y", Orders.OrderDate) = "' . $year . '" ';
		$sql .= ' ORDER BY Orders.OrderDate ASC ';
		$sql .= ' LIMIT 10 OFFSET ' . $offset . '; ';
		
		try {
			$req = $this->db->query($sql);
			$res = $req->fetchAll(PDO::FETCH_ASSOC);				
		}
		catch (PDOException $e) { 
			die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
		}
		
		return $res;
	}	
}
?>