<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['next']!=1)
{
	header("Location: ../views/sellerRegistration.php");
}
else
	{
$First_Name = "";
		$Last_Name = "";
		$Email = "";
		$Mobileno = "";
		$adress = "";
		$pickup = "";
		
		
	
		$Username = "";
		
		$sqt = "";
		$errorcount=0;
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		
		$First_Name = test_input($_POST['firstname']);
		$Last_Name = test_input($_POST['lastname']);
		$Email = test_input($_POST['email']);
		$Mobileno = test_input($_POST['mobileNo']);
		$adress = test_input($_POST['address']);
		$pickup = test_input($_POST['pickup']);
		$Gender = isset($_POST['gender']) ? test_input($_POST['gender']):NULL;
		$Area = isset($_POST['area']) ? test_input($_POST['area']):NULL;
		$Password = test_input($_POST['password']);
		$APassword = test_input($_POST['againpassword']);
		$Username = test_input($_POST['username']);
		$sq = isset($_POST['sq']) ? test_input($_POST['sq']):NULL;
		$sqt = test_input($_POST['sqt']);




		$_SESSION['First_Name'] = $First_Name;
		$_SESSION['Last_Name'] = $Last_Name ;
		$_SESSION['Email'] = $Email;
		$_SESSION['Mobileno'] = $Mobileno;
		$_SESSION['adress'] = $adress;
		$_SESSION['pickup'] = $pickup;
		$_SESSION['Username'] = $Username;
		$_SESSION['sqt'] = $sqt;
		















		if(empty($First_Name)){
			$_SESSION['firstnameErrMsg'] = "First Name is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$First_Name)) {
				$errorcount++;
				$_SESSION['firstnameErrMsg'] = "Only letters and spaces";
			}
			else{
				$_SESSION['firstnameErrMsg'] = "";
			}
		}
		if(empty($Last_Name)){
			$_SESSION['lastnameErrMsg'] = "Last Name is Empty";
			$errorcount++;
		}
		else {
			if (!preg_match("/^[a-zA-Z-' ]*$/",$Last_Name)) {
				$errorcount++;
				$_SESSION['lastnameErrMsg']  = "Only letters and spaces";
			}
			else{
				$_SESSION['lastnameErrMsg'] = "";
			}
		}
		if(empty($Gender)){
			$_SESSION['genderErrMsg'] = "Gender is Empty";
			$errorcount++;
		}
		
		if(empty($Password)){
			$_SESSION['passwordErrMsg'] = "Password is Empty";
			$errorcount++;
		}
				else{
				$_SESSION['passwordErrMsg'] = "";
			}

		if(empty($pickup)){
			$_SESSION['pickupErrMsg'] = "PickUp address is Empty";
			$errorcount++;
		}
				else{
				$_SESSION['pickupErrMsg'] = "";
			}

		if(empty($sqt)){
			$_SESSION['sqtErrMsg'] = "Scurity question is Empty";
			$errorcount++;
		}
				else{
				$_SESSION['sqtErrMsg'] = "";
			}

		if(empty($Username)){
			$_SESSION['usernameErrMsg'] = "Username is Empty";
			$errorcount++;
		}
		elseif ($check>0) {
			$_SESSION['usernameErrMsg'] = "This User name Is already taken";
			$errorcount++;
			
		}
				else{
				$_SESSION['usernameErrMsg'] = "";
			}

		if(empty($Area)){
			$_SESSION['AreaErrMsg'] = "Country is Empty";
			$errorcount++;
		}
				else{
				$_SESSION['AreaErrMsg'] = "";
			}

		if(empty($Mobileno)){
			$_SESSION['mobileErrMsg'] = "Mobile  is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[0-9]*$/",$Mobileno)) {
				$errorcount++;
				$_SESSION['mobileErrMsg'] = "Only Numbers";
			}
				else{
				$_SESSION['mobileErrMsg'] = "";
			}
}
		if(empty($Email)){
			$_SESSION['emailErrMsg'] = "Email  is Empty";
			$errorcount++;
		}
		else {
			if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['emailErrMsg'] = "Please correct your email";
				$errorcount++;
			}
					else{
				$_SESSION['emailErrMsg'] = "";
			}

		}
		if(empty($adress)){
			$_SESSION['addressErrMsg'] = "Address is Empty";
			$errorcount++;
		}
				else{
				$_SESSION['addressErrMsg'] = "";
			}
	

		if(empty($APassword)){
			$_SESSION['ApasswordErrMsg'] = "Retype Password is Empty";
			$errorcount++;
		}

		else
		{
			if($APassword!=$Password)
			{
				$_SESSION['ApasswordErrMsg'] = "Password does not match";
				$errorcount++;
			}
					else{
				$_SESSION['ApasswordErrMsg'] = "";
			}

		}


		if($errorcount==0){
			$conn = connect();
			if($conn) {

			$sql = "INSERT INTO sellerdata(username,firstname,lastname,gender,email,mobile_no,address,area,password,pickup,sq,sqt) VALUES ('$Username','$First_Name','$Last_Name','$Gender','$Email','$Mobileno','$adress','$Area','$Password','$pickup','$sq','$sqt')";
if ($conn->query($sql) === TRUE){
			$_SESSION['registrationStatus']="Registration Successfull";}
			else{
				$_SESSION['registrationStatus']="Registration Unsuccessfull";

			}


		}

			$_SESSION['firstnameErrMsg']=null;
	$_SESSION['passwordErrMsg']=null;
	 $_SESSION['usernameErrMsg']=null;
	$_SESSION['lastnameErrMsg']=null;
	  $_SESSION['genderErrMsg']=null;
	 $_SESSION['emailErrMsg']=null;
	  $_SESSION['mobileErrMsg']=null;
	   $_SESSION['addressErrMsg']=null;
	   $_SESSION['ApasswordErrMsg']=null;
	   $_SESSION['pickupErrMsg']=null;
	    $_SESSION['sqtErrMsg']=null;

		$_SESSION['First_Name'] = null;
		$_SESSION['Last_Name'] = null;
		$_SESSION['Email'] = null;
		$_SESSION['Mobileno'] = null;
		$_SESSION['adress'] = null;
		$_SESSION['pickup'] = null;
		$_SESSION['Username'] = null;
		$_SESSION['sqt'] = null;
	    
	    
	
		}

		else{
			$_SESSION['registrationStatus']="Registration failed";
		}	
	}
	header("Location: ../views/sellerRegistration.php");
$_SESSION['next']=0;

}

?>