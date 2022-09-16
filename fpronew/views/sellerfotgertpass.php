<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<script src="js/forgotpass_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/forgotPass.css">
</head>
<body>
<div id="main">
	<?php require '../Controller/header.php';

$sqtErr=$usernameErrMsg="";
		$sq=$sqt=$Username ="";
		$status="";

if(isset($_SESSION['nextfp']))
{
	if($_SESSION['nextfp']==0)
	{
		$sqtErr=$_SESSION['sqtErr'];
		$usernameErrMsg=$_SESSION['usernameErrMsg'];
		
		$Username =$_SESSION['Username'];
		$status=$_SESSION['status'];
	}
}







?>




<div id="form">
<form action="../Controller/sellerForgetPassAction.php" method="POST" novalidate onsubmit="return validate(this);">
				<fieldset>
					<legend>
						Forgot Password
					</legend>
					<label for="username">Username</label>
						<input type="text" name="username" id="username" value="<?php echo $Username?>">
						<span id="usernameErrMsg"></span>
						<span style="color: red">
						<?php
							echo $usernameErrMsg;
						?>
					</span>
						<br><br>
					<label for="sq">Security Question You answered</label>
					<br><br>

						<select id="sq" name="sq">
							<option value="sq1">What is your nick name?</option>
							<option value="sq2">What is your home town?</option>
							<option value="sq3">What was your school?</option>
							
						</select>


						<input type="text" name="sqt" id="sqt" value="<?php echo $sqt?>">
<center>
						<span id="sqtErr"></span>
						<span style="color: red">
						<?php
							echo $sqtErr;
						?>
					</span>
					</center>
						<br><br>
						<input type="Submit" name="Recover" id="submit">
				</fieldset>
			</form>
			<h1><?php
			echo $status;
			?></h1>
			</div>
			</div>
			<div id="for">
			<?php
require '../Controller/fotter.php';
$_SESSION['nextfp']=1;

?>
</div>
</body>
</html>
