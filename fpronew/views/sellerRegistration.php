<?php
session_start();





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Seller Registration</title>
	<link rel="stylesheet" type="text/css" href="css/reg.css">
	<script src="js/reg_validation.js"></script>
</head>
<body>

	<div id="reg">
		<?php require '../Controller/header.php';
	$firstnameErrMsg =$passwordErrMsg=$usernameErrMsg= $lastnameErrMsg = $genderErrMsg = $emailErrMsg = $mobileErrMsg = $addressErrMsg =$ApasswordErrMsg =$pickupErrMsg = $sqtErrMsg = $areaErrMsg = "";
	$registrationStatus="";
	$errorcount=0;
	$count=0;


	$First_Name = "";
		$Last_Name = "";
		$Email = "";
		$Mobileno = "";
		$adress = "";
		$pickup = "";
		
		
	
		$Username = "";
		
		$sqt = "";
		$errorcount=0;
	

if( isset($_SESSION['next'])){
	if($_SESSION['next']==0 ){
		


	$registrationStatus=$_SESSION['registrationStatus'];
	

	$firstnameErrMsg =$_SESSION['firstnameErrMsg'];
	$passwordErrMsg=$_SESSION['passwordErrMsg'];
	$usernameErrMsg= $_SESSION['usernameErrMsg'];
	$lastnameErrMsg =$_SESSION['lastnameErrMsg'];
	 $genderErrMsg = $_SESSION['genderErrMsg'];
	 $emailErrMsg =$_SESSION['emailErrMsg'];
	  $mobileErrMsg =$_SESSION['mobileErrMsg'];
	   $addressErrMsg =$_SESSION['addressErrMsg'];
	   $ApasswordErrMsg =$_SESSION['ApasswordErrMsg'];
	   $pickupErrMsg =$_SESSION['pickupErrMsg'];
	    $sqtErrMsg = $_SESSION['sqtErrMsg'];
	    $areaErrMsg = "";



$First_Name = $_SESSION['First_Name'];
		$Last_Name = $_SESSION['Last_Name'];
		$Email = $_SESSION['Email'];
		$Mobileno = $_SESSION['Mobileno'];
		$adress =$_SESSION['adress'];
		$pickup = $_SESSION['pickup'];
		
		
	
		$Username = $_SESSION['Username'];
		
		$sqt = $_SESSION['sqt'];









	
	$_SESSION['next']=null;}
}
			
?>







<form action="../Controller/regAction.php" method="POST" novalidate onsubmit="return validate(this);">
	<div id="f1">
	<fieldset>
		<legend>Genaral</legend>
		<label for="firstname">First Name</label>
		<input type="text" name="firstname" id="firstname" autofocus value="<?php echo $First_Name?>">
		<center>
		<span id="firstnameErrMsg"></span>
		
		<span style="color: red">

		<?php
			echo $firstnameErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="lastname">Last Name</label>
		<input type="text" name="lastname" id="lastname" value="<?php echo $Last_Name?>">
		<center>
		<span id="lastnameErrMsg"></span>
		<span style="color: red">
		<?php
			echo $lastnameErrMsg;
		?>
		</span>

		<br><br>
		<label for="gender">Gender: </label>
		
		<input type="radio" name="gender" id="male" value="Male">
		<label for="male">Male</label>
		
		<input type="radio" name="gender" id="female" value="Female">
		<label for="female">Female</label>
		<span id="genderErrMsg"></span>
		<span style="color: red">
		<?php
			echo $genderErrMsg;
		?>
		</span>
	</fieldset>
	</div>
	<div id="f2">
	<fieldset>
		<legend>Contact</legend>
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?php echo $Email?>">
		<span id="emailErrMsg"></span>
		<span style="color: red">
		<?php
			echo $emailErrMsg;
		?>
		</span>
		
		<br><br>
		<label for="mobileNo">Mobile No</label>
		<input type="text" name="mobileNo" id="mobileNo" value="<?php echo $Mobileno?>">
		<center>
		<span id="mobileErrMsg"></span>
		<span style="color: red">
		<?php
			echo $mobileErrMsg;
		?>
		</span>
		</center>
	</fieldset>
	</div>
	<div id="f3">
	<fieldset>
		<legend>Address</legend>
		<label for="address">Street/House/Road</label>
		<input type="text" name="address" id="address" value="<?php echo $adress?>">
		<center>
		<span id="addressErrMsg"></span>
		<span style="color: red">
		<?php
			echo $addressErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="area">Area</label>
		<select id="area" name="area">
			<option value="mirpur">Mirpur</option>
			<option value="gulshan">Gulshan</option>
			<option value="uttora">Uttora</option>
			<option value="gantoli">Gabtoli</option>
		</select>
		<span style="color: red">
		<?php
			echo $areaErrMsg;
		?>
		</span>
		<br><br>

		<label for="pickup">Product Pickup Adress</label>
		<input type="text" name="pickup" id="pickup" value="<?php echo $pickup?>">
		<center>
		<span id="pickupErrMsg"></span>
		<span style="color: red">
		<?php
			echo $pickupErrMsg;
		?>
		</span>
		</center>
		<br><br>
	</fieldset>
	</div>
	<div id="f4">
	<fieldset>
		<legend>Log in Info</legend>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo $Username?>">
		<center>
		<span id="usernameErrMsg"></span>
		<span style="color: red">
		<?php
			echo $usernameErrMsg;
		?>
		</span>
	</center>
		<br><br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<center>
		<span id="passwordErrMsg"></span>
		<span style="color: red">
		<?php
			echo $passwordErrMsg;
		?>
		</span>
	</center>
		<br><br>

		<label for="againpassword">Confirm Password</label>
		<input type="password" name="againpassword" id="againpassword">
		<center>
		<span id="ApasswordErrMsg"></span>
		<span style="color: red">
		<?php
			echo $ApasswordErrMsg;
		?>
		</span>
	</center>
		<br><br>
		<label for="sqt">Security Question</label>

		<select id="sq" name="sq">
			<option value="sq1">What is your nick name?</option>
			<option value="sq2">What is your home town?</option>
			<option value="sq3">What was your school?</option>
			
		</select>


		<input type="text" name="sqt" id="sqt" value="<?php echo $sqt?>">
		<center>
		<span id="sqtErrMsg"></span>
		<span style="color: red">
		<?php
			echo $sqtErrMsg;
		?>
		</span>
	</center>
	</fieldset>
	
	<br>

	<input type="Submit" value="Registration" id="submit">
</form>
<h1><?php
			echo $registrationStatus;
?></h1>

<h4>If you already have an account <a href="sellerlogin.php">login</a></h4>
</div>
</div>

<?php
require '../Controller/fotter.php';
$_SESSION['next']=1;

?>

</body>
</html>
