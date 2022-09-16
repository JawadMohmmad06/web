<?php
session_start();

if(isset($_SESSION["id"]))
{
	header("Location: welcome.php");
}
elseif (isset($_COOKIE["id"])) {
	header("Location: welcome.php");
	
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
<script src="js/login_validation.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="main">

	<?php
	require '../Controller/header.php';
		$passwordErrMsg=$usernameErrMsg="";
		$Password=$Username ="";
		$loginStatus="";
		if(isset($_SESSION['nextl']) )
			if($_SESSION['nextl']==0){
		{
			$passwordErrMsg=$_SESSION['passwordErrMsg'];
		$usernameErrMsg=$_SESSION['usernameErrMsg'];
		$Password=$_SESSION['Password'];
		$Username =$_SESSION['Username'];
		$loginStatus=$_SESSION['loginStatus'];
		$_SESSION['nextl']=null;
}
		}
		elseif($_SESSION['nextl']==5)
		{
			$loginStatus=$_SESSION['loginStatus'];
			$_SESSION['nextl']=null;
		}

			
	?>
	<div id="form">
<form action="../Controller/loginAction.php"method="POST" novalidate  onsubmit="return validate(this);" >
	<fieldset>
		<legend>Log in Info</legend>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autofocus value="<?php echo $Username?>">
		<span id="usernameErrMsg"></span>
		<span style="color: red">
		<?php
			echo $usernameErrMsg;
		?>
		</span>
		<br><br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<span id="passwordErrMsg"></span>
		<span style="color: red">
		<?php
			echo $passwordErrMsg;
		?>
		</span>
		<br><br>
		<input type="checkbox" name="rm" id="rm">
		<label for="rm">Remember me?</label>
	</fieldset>
	<br>
	<input type="Submit" value="Log in" id="submit">
	<h1><?php
			echo $loginStatus;

?></h1>
</form>

<p>Don't have an account? <a href="sellerRegistration.php">Register</a></p>
<a href="../views/sellerfotgertpass.php">Forgot Password?</a>
</div>
</div>
<div id="foot">
<?php

require '../Controller/fotter.php';
$_SESSION['nextl']=1;
?>
</div>
</body>
</html>

