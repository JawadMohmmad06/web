<?php
session_start();

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
	<title>Change Password</title>
	<script src="js/passupdate_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/updatePass.css">
</head>
<body>
<div id="main">
<?php
require '../Controller/headin.php';
$Password="";
$newpassword="";
$cpassword="";
$passErrMsg =$newpassErrMsg = $cpassErrMsg = ""; 
$uppdateStatus="";
if(isset($_SESSION['nextcp'])){
if($_SESSION['nextcp']==0)
{




$passErrMsg =$_SESSION['passErrMsg'];
$newpassErrMsg = $_SESSION['newpassErrMsg'];
$cpassErrMsg = $_SESSION['cpassErrMsg'];
$uppdateStatus=$_SESSION['uppdateStatus'];
$_SESSION['nextcp']=null;



}
}

?>




<div id="form">
<form action="../Controller/sellerPasswordUpdateAction.php" method="POST" novalidate onsubmit="return validate(this);">
	<fieldset>
		<legend>Change Password</legend>
		<label for="password">Old Password</label>
		<input type="password" name="password" id="password">
		<center>
		<span id="passErrMsg"></span>

		<span style="color: red">
		<?php
			echo $passErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="newpassword">New Password</label>
		<input type="password" name="newpassword" id="newpassword">
		<center>
		<span id="newpassErrMsg"></span>

		<span style="color: red">
		<?php
			echo $newpassErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="confirmpassword">Confirm Password</label>
		<input type="password" name="confirmpassword" id="confirmpassword">
		<center>
		<span id="usernameErrMsg"></span>

		<span style="color: red">
		<?php
			echo $cpassErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<input type="submit" name="changepassword" id="submit" value="Change Password">
	</fieldset>
	
</form>

<h2>
<?php
echo $uppdateStatus;

?>
</div>
</div>
<div id="foot">
<?php
$_SESSION['nextcp']=1;
require '../Controller/fotter.php';

?>
</div>
</h2>

</body>
</html>
