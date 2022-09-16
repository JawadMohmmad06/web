<?php 
session_start();
	if(!isset($_SESSION["id"]))
{
	if(!isset($_COOKIE["id"])){
	header("Location: sellerlogin.php");}
}
else
{
	$id=$_SESSION['id'];
	
		require '../model/Connection.php';

		$conn = connect();
		$q = $_GET['q'];
		$sql = "SELECT * FROM productdata WHERE id= '$id' AND pname LIKE '%{$q}%'";
		$result = mysqli_query($conn, $sql);
		echo "<table id='table2'>";
	echo "<tr id='tr'>";
	echo "<th id='th'>Product ID</th>";
	echo "<th>Product Name</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "<th>Description</th>";
	
	echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
		
	echo "<tr id='tr'>";
  echo "<td id='td'>" . $row['productid'] . "</td>";
	echo "<td>" . $row['pname'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "<td>" . $row['quantity'] . "</td>";
	echo "<td>" . $row['descip'] . "</td>";
	
	echo "</tr>";
	}
	echo "</table>";
mysqli_close($conn);
	}
?>