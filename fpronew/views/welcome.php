<?php
session_start();

require '../model/Connection.php';
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
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
</head>
<body>
<div id="main">
	<?php

				require '../Controller/headin.php';	
				$conn = connect();
				if(isset($_SESSION['id']))
				{
				$id=$_SESSION['id'];}
				elseif(isset($_COOKIE['id']))
				{
					$id=$_COOKIE['id'];
				}
				$sql = "SELECT * FROM sellerdata WHERE id='$id'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				

				$count = mysqli_num_rows($result);

				    if($count===1)			
					{
						$firstname=$row["firstname"];
						$lastname=$row["lastname"];

					}
					


	?>
	<div id="name">
<h3>welcome <?php
echo $firstname." ".$lastname; 
?>

</h3>
</div>





</body>
<fieldset>
<img src="../Controller/welcome.jpg"  width="1300" height="300">
</fieldset>
</div>
<div id="foot">
<?php
require '../Controller/fotter.php';

?>
</div>
</html>
