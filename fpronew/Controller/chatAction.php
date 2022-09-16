<?php
session_start();
		require '../model/Connection.php';
		$conn = connect();
		$id=$_SESSION['id'];
		$sql = "SELECT * FROM chat WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		echo "<table id='table'>";
		echo "<tr id='tr'>";
	echo "<th id='th'>Chat</th>";
echo "</tr>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr id='tr'>";
  echo "<td id='td'>" . $row['chat'] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
mysqli_close($conn);





?>