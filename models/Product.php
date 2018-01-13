<?php
class Product {
	private $db;

	public function __construct() {
		$this->db = Db::getInstance();
	}

	public function getAllProducts() {
		$sql =  ' select ProductID, ProductName, QuantityPerUnit, UnitPrice ';
		$sql .= ' from Products ';
		$sql .= ' order by ProductID; ';
		try {
			$req = $this->db->query($sql);
			return $req->fetchAll(PDO::FETCH_ASSOC);			
		}
		catch (PDOException $e) { 
			die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
		}		
	}	

	public function getCurrentProducts() {
		$sql =  ' select ProductID, ProductName, QuantityPerUnit, UnitPrice ';
		$sql .= ' from Products ';
		$sql .= ' where Discontinued = 0 ';
		$sql .= ' order by ProductID; ';
		try {
			$req = $this->db->query($sql);
			return $req->fetchAll(PDO::FETCH_ASSOC);			
		}
		catch (PDOException $e) { 
			die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
		}		
	}

	public function getDiscontinuedProducts() {
		$sql =  ' select ProductID, ProductName, QuantityPerUnit, UnitPrice ';
		$sql .= ' from Products ';
		$sql .= ' where Discontinued = 1 ';
		$sql .= ' order by ProductID; ';
		try {
			$req = $this->db->query($sql);
			return $req->fetchAll(PDO::FETCH_ASSOC);			
		}
		catch (PDOException $e) { 
			die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
		}
	}	
}
?>