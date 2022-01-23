<?php
class DBController {
	//change this if needed 

	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "at2hb_db";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	//change this if needed
	function pdo() {
		$conn = new PDO("mysql:host=$this->host;dbname=$this->database", "$this->user", "$this->password");
		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
}
?>