<?php
session_start();
require '../model/Connection.php';
		$id=$_SESSION['id'];
		$conn = connect();
		$q = $_GET['q'];
		$sql = "SELECT * FROM productfeedback WHERE id= '$id' AND cname LIKE '%{$q}%'";
		$result = mysqli_query($conn, $sql);
		echo "<table id='table2'>";
	echo "<tr id='tr'>";
	echo "<th id='th'>Customer Name</th>";
	echo "<th>Product Name</th>";
	echo "<th>Quantity</th>";
	echo "<th>Feedback</th>";
	
	echo "</tr>";
	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		
	echo "<tr id='tr'>";
  echo "<td id='td'>" . $row['cname'] . "</td>";
	echo "<td>" .$row['pname']. "</td>";
	
	echo "<td>" . $row['quantity'] . "</td>";
	echo "<td>" . $row['feedback']. "</td>";
	
	echo "</tr>";
	}
	echo "</table>";


?>