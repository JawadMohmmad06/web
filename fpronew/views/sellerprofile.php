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
	<title>Profile</title>
	<script src="js/profile_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>
	<div id="main">
<?php  
require '../Controller/headin.php';
$First_Name = "";
		$Last_Name = "";
		$Email = "";
		$Mobileno =0;
		$adress = "";
		$pickup = "";
		$Gender = "";
		$Area = "";		
			$firstnameErrMsg =$passwordErrMsg=$usernameErrMsg= $lastnameErrMsg = $genderErrMsg = $emailErrMsg = $mobileErrMsg = $addressErrMsg =$pickupErrMsg = $areaErrMsg = "";
	$uppdateStatus="";
	$gsm="";

	$gsf="";
	$sm="";
	$sg="";
	$su="";
	$sga="";
	$uppdateStatus='';


if(isset($_SESSION['nextp']))
{
	if($_SESSION['nextp']==0)
	{
		$Username=$_SESSION['Username'];
		$First_Name = $_SESSION['First_Name'];
		$Last_Name = $_SESSION['Last_Name'];
		$Email = $_SESSION['Email'];
		$Mobileno =$_SESSION['Mobileno'];
		$adress = $_SESSION['adress'];
		$pickup = $_SESSION['pickup'];
		$Area = $_SESSION['Area'];
		$firstnameErrMsg =$_SESSION['firstnameErrMsg'];
		$passwordErrMsg=$_SESSION['passwordErrMsg'];
		$usernameErrMsg= $_SESSION['usernameErrMsg'];
		$lastnameErrMsg =$_SESSION['lastnameErrMsg'];
		 $genderErrMsg = $_SESSION['genderErrMsg'];
		 $emailErrMsg = $_SESSION['emailErrMsg'];
		 $mobileErrMsg = $_SESSION['mobileErrMsg'];
		 $addressErrMsg =$_SESSION['addressErrMsg'];
		 $pickupErrMsg = $_SESSION['pickupErrMsg'];
		 $areaErrMsg = $_SESSION['areaErrMsg'];
		 $gsf=$_SESSION['gsf'];
	     $sm=$_SESSION['sm'];
	     $sg=$_SESSION['sg'];
	     $su=$_SESSION['su'];
	     $sga=$_SESSION['sga'];
	     $id=$_SESSION['id'];
	     $gsm=$_SESSION['gsm'];
								$gsf=$_SESSION['gsf'];

	     $_SESSION['nextp']=null;
	     $uppdateStatus=$_SESSION['uppdateStatus'];

	}



}


?>

<form action="../Controller/sellerProfileAction.php" method="POST" novalidate onsubmit="return validate(this);">
	<div id="f1">
	<fieldset>
		<legend>Update/view Profile</legend>
		<label for="id">ID</label>
		<input type="text" name="id" id="id" placeholder="<?php echo $id?>" readonly>
		<br><br>
		<label for="username">User Name</label>
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
		<label for="firstname">First Name</label>
		<input type="text" name="firstname" id="firstname" value="<?php echo $First_Name?>">
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
		</center>
				<br><br>
		<label for="gender">Gender: </label>
		
		<input type="radio" name="gender" id="male" value="Male" <?php echo $gsm?>>
		<label for="male">Male</label>
		
		<input type="radio" name="gender" id="female" value="Female" <?php echo $gsf?>>
		
		<label for="female">Female</label>
		<span id="genderErrMsg"></span>
		<span style="color: red">
		<?php
			echo $genderErrMsg;
		?>
		</span>
		<br><br>
		</div>
		<div id="f2">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?php echo $Email?>">
		<center>
		<span id="emailErrMsg"></span>
		<span style="color: red">
		<?php
			echo $emailErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="mobileno">Mobile No</label>
		<input type="text" name="mobileno" id="mobileno" value="<?php echo $Mobileno?>">
		<span id="mobileErrMsg"></span>
		<span style="color: red">
		<?php
			echo $mobileErrMsg;
		?>
		</span>
		</center>
		<br><br>
		<label for="area">Area</label>
		<select id="area" name="area">
			<option value="mirpur" <?php echo $sm?>>Mirpur</option>
			<option value="gulshan" <?php echo $sg?>>Gulshan</option>
			<option value="uttora" <?php echo $su?>>Uttora</option>
			<option value="gantoli" <?php echo $sga?>>Gabtoli</option>
		</select>
		<span style="color: red">
		<?php
			echo $areaErrMsg;
		?>
		</span>

		<br><br>
		<label for="addres">Address</label>
		<input type="text" name="addres" id="addres" value="<?php echo $adress?>">
		<center>
		<span id="addressErrMsg"></span>
		<span style="color: red">
		<?php
			echo $addressErrMsg;
		?>
		</span>
		</center>
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
		<input type="submit" name="update" id="submit" value="Update Info">
	</fieldset>
	<h2>
<?php
echo $uppdateStatus;

?>
</h2>

</form>
</div>
</div>
<div id="foot">
<?php
$_SESSION['nextp']=1;
require '../Controller/fotter.php';

?>
</div>
</body>
</html>


