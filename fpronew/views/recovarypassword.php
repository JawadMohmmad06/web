<?php
session_start();

if(!isset($_SESSION["id"]))
{
	header("Location: ../views/sellerlogin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recovary Password</title>
	<script src="js/recopass_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/recoPass.css">
</head>
<body>
<div id="main">

<?php

require '../Controller/header.php';
$newpassErr=$retypepassErr="";
	$newpass=$retypepass="";
	$passchangeStatus="";

if(isset($_SESSION['nextr']))
{
	if($_SESSION['nextr']==0)
	{
		$newpassErr=$_SESSION['newpassErr'];
		$retypepassErr=$_SESSION['retypepassErr'];
	$newpass=$_SESSION['newpass'];
	$retypepass=$_SESSION['retypepass'];
	$passchangeStatus=$_SESSION['passchangeStatus'];
	}
}






?>

<div id="form">

<form action="../Controller/recovaryPasswordAction.php" method="POST" novalidate novalidate onsubmit="return validate(this);">
	<fieldset>
		<legend>
			Recover Password
		</legend>
		<label for="newpassword" >New Password</label>
		<input type="password" name="newpassword" id="newpassword" autofocus>
		<center>
		<span id="newpassErr"></span>
		<span style="color: red">
		<?php
			echo $newpassErr;
		?>
		</span>
		</center>
		<br><br>
		<label for="retypepassword" >Confirm Password</label>
		<input type="password" name="retypepassword" id="retypepassword" >
		<center>
		<span id="retypepassErr"></span>
		<span style="color: red">
		<?php
			echo $retypepassErr;
		?>
		</span>
		</center>
		<br><br>
		<input type="Submit" name="changepassword" id="submit" value="Change Password">

	</fieldset>
</form>
		<?php
			echo $passchangeStatus;
		?>
		</div>
		</div>
		<div id="foot">
		<?php 
require '../Controller/fotter.php';
$_SESSION['nextr']=1;
?>
</div>
</body>
</html>
