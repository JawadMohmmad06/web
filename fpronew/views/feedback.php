<?php
session_start();

require '../Controller/feedbackAction.php';
if(!isset($_SESSION["id"]))
{
	if(!isset($_COOKIE["id"])){
	header("Location: sellerlogin.php");}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
	<script src="js/searchfeedback.js"></script>
</head>
<body>
	




<div id="main">


	<?php 
	require '../Controller/headin.php';
	$id=$_SESSION['id'];
	$result=show1($id);
	
	echo "<table id='table'>";
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


<br><br>
	<div id="t">
<form action="">
	<input type="text" name="text" onkeyup="showHint(this.value)">

</form>
<p>Suggestions: <span id="txtHint"></span></p>
	</div>
</div>


</div>
<div id="foot">
	<?php
require '../Controller/fotter.php';

?>

</div>
</body>
</html>


