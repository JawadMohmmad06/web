<?php 
	
	function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "fprodatabase";

		$conn = mysqli_connect($hostname, $username, $password, $dbname);

		return $conn;
	}
?>