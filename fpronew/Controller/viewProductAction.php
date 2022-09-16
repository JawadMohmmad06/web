<?php 
require '../model/Connection.php';
function show1($id)
{
$conn = connect();
$sql = "SELECT * FROM productdata WHERE id='$id'";
				$result = mysqli_query($conn, $sql);
				
				
				
return $result;
				

				

}







?>