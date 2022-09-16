<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';



	if(isset($_SESSION['id']))
	{
	$id=$_SESSION['id'];}
	elseif (isset($_COOKIE['id'])) {
		

		$id=$_COOKIE['id'];
		
	}
	
	$errorcount=0;
	$count=0;
		$Username = "";
						if ($_SERVER['REQUEST_METHOD'] === "POST"){

						$Username= test_input($_POST['username']);
								$First_Name = test_input($_POST['firstname']);
								$Last_Name = test_input($_POST['lastname']);
								$Email = test_input($_POST['email']);
								$Mobileno = test_input($_POST['mobileno']);
								$adress = test_input($_POST['addres']);
								$pickup = test_input($_POST['pickup']);
								$Gender = isset($_POST['gender']) ? test_input($_POST['gender']):NULL;
								$Area = isset($_POST['area']) ? test_input($_POST['area']):NULL;
								$_SESSION['First_Name']=$First_Name;
								$_SESSION['Last_Name']=$Last_Name;
								$_SESSION['Email']=$Email;
								$_SESSION['Mobileno']=$Mobileno;
								$_SESSION['adress']=$adress;
								$_SESSION['pickup']=$pickup;
								$_SESSION['Gender']=$Gender;
								$_SESSION['Area']=$Area;
								$_SESSION['Username']=$Username;
								$_SESSION['id']=$id;











			if(empty($First_Name)){
			$_SESSION['firstnameErrMsg'] = "First Name is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$First_Name)) {
				$errorcount++;
				$_SESSION['firstnameErrMsg'] = "Only letters and spaces";
			}
			else
			{
				$_SESSION['firstnameErrMsg'] = "";
			}}
		if(empty($Last_Name)){
			$_SESSION['lastnameErrMsg'] = "Last Name is Empty";
			$errorcount++;
		}
		else {
			if (!preg_match("/^[a-zA-Z-' ]*$/",$Last_Name)) {
				$errorcount++;
				$_SESSION['lastnameErrMsg']  = "Only letters and spaces";
			}
			else
			{
				$_SESSION['lastnameErrMsg']  = "";
			}
		}
		if(empty($Gender)){
			$_SESSION['genderErrMsg'] = "Gender is Empty";
			$errorcount++;
		}
				if(empty($pickup)){
			$_SESSION['genderErrMsg']  = "PickUp address is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['genderErrMsg']  = "";
		}
		
		if(empty($Username)){
			$_SESSION['usernameErrMsg'] = "Username is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['usernameErrMsg'] = "";
		}
		if(empty($Area)){
			$_SESSION['AreaErrMsg'] = "Country is Empty";
			$errorcount++;
		}
		else
		{
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
			else
			{
				$_SESSION['mobileErrMsg'] = "";
			}}
		if(empty($Email)){
			$_SESSION['emailErrMsg'] = "Email  is Empty";
			$errorcount++;
		}
		else {
			if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['emailErrMsg'] .= "Please correct your email";
				$errorcount++;
			}
			else
			{
				$_SESSION['emailErrMsg'] .= "";
			}
		}
		if(empty($adress)){
			$_SESSION['addressErrMsg'] = "Address is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['addressErrMsg'] = "";
		}	
if($errorcount==0)
{
		$conn = connect();
		if($conn) {
				$sql="UPDATE sellerdata SET username='$Username',firstname='$First_Name',lastname='$Last_Name',mobile_no='$Mobileno',address='$adress',pickup='$pickup',gender='$Gender',area='$Area',email='$Email' WHERE id='$id'";
				if($conn->query($sql) === TRUE)
				{


							$_SESSION['uppdateStatus']="Information Updated";

}




					







}



							







					







}
else
{
	$_SESSION['uppdateStatus']="Information Not Updated";
}

}


$conn = connect();

				$sql = "SELECT * FROM sellerdata WHERE id='$id'";
$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				

				$count = mysqli_num_rows($result);
				
						
							$First_Name=$row['firstname'];
								$Last_Name=$row['lastname'];
								$Email=$row['email'];
								$Mobileno=$row['mobile_no'];
								$adress=$row['address'];
								$pickup=$row['pickup'];
								$Gender=$row['gender'];
								$Area=$row['area'];
								$Username=$row['username'];
								$_SESSION['id']=$row['id'];
								





							if($row['gender']=="Male")
							{
								$_SESSION['gsm']="Checked";
								$_SESSION['gsf']="";
							}
							else
							{
								$_SESSION['gsm']="";
								$_SESSION['gsf']="Checked";
							}
							if($Area=="mirpur")
							{
								$_SESSION['sm']="selected";
								$_SESSION['sg']="";
								$_SESSION['su']="";
								$_SESSION['sga']="";


							}
							elseif ($Area=="gulshan")
							{
								$_SESSION['sg']="selected";
								$_SESSION['sm']="";
								$_SESSION['su']="";
								$_SESSION['sga']="";
							}
							elseif ($Area=="uttora")
							{
								$_SESSION['su']="selected";
								$_SESSION['sg']="";
								$_SESSION['sm']="";
								$_SESSION['sga']="";
							}
							elseif ($Area=="gantoli")
							{
								$_SESSION['sga']="selected";
								$_SESSION['sg']="";
								$_SESSION['su']="";
								$_SESSION['sm']="";
							}

							$_SESSION['First_Name']=$First_Name;
								$_SESSION['Last_Name']=$Last_Name;
								$_SESSION['Email']=$Email;
								$_SESSION['Mobileno']=$Mobileno;
								$_SESSION['adress']=$adress;
								$_SESSION['pickup']=$pickup;
								
								$_SESSION['Area']=$Area;
								$_SESSION['Username']=$Username;
								$_SESSION['id']=$id;
								
	  



if($_SERVER['REQUEST_METHOD'] === "GET")
{
	$_SESSION['firstnameErrMsg']="";
$_SESSION['passwordErrMsg']="";
 $_SESSION['usernameErrMsg']="";
		$_SESSION['lastnameErrMsg']="";
		 $_SESSION['genderErrMsg']="";
 $_SESSION['emailErrMsg']="";
	 $_SESSION['mobileErrMsg']="";
		$_SESSION['addressErrMsg']="";
		 $_SESSION['pickupErrMsg']="";
		  $_SESSION['areaErrMsg']="";
		  $_SESSION['uppdateStatus']="";

}


header("Location: ../views/sellerprofile.php");
							
							
							
	$_SESSION['nextp']=0;				
				
				

	

	?>







