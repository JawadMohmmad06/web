<?php
session_start();
		require '../model/Connection.php';
		$id=$_SESSION['id'];
		$conn = connect();
		$q = $_POST['q'];
		$sql="INSERT INTO chat(id,chat) VALUES ('$id','$q')";
		$conn->query($sql);





?>