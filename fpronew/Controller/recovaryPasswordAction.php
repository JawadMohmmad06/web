<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if(!isset($_SESSION['nextr']))
{
	header("Location: ../views/sellerlogin.php");
}
else if($_SESSION['nextr']!=1)
{
	header("Location: ../views/recovarypassword.php");
}

else
	{



	
	$errorcount=0;
	$count=0;
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		
		$newpass = test_input($_POST['newpassword']);
		$retypepass = test_input($_POST['retypepassword']);
		$_SESSION['newpass']=$newpass;
		$_SESSION['retypepass']=$retypepass;

		if(empty($newpass)){
			$_SESSION['newpassErr'] = "New password is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['newpassErr'] = "";
		}
		if(empty($retypepass)){
			$_SESSION['retypepassErr'] = "Confirm Password is Empty";
			$errorcount++;
		}
		else
		{
			if($newpass!=$retypepass)
			{
				$_SESSION['retypepassErr'] = "Passwors mismatch";
				$errorcount++;
		}
		else
		{
			$_SESSION['retypepassErr'] = "";
		}
			}
			$id=$_SESSION["id"];
			if($errorcount==0 and $newpass!="" and $retypepass!=""){
				$conn = connect();
			if($conn) {
				$sql="UPDATE sellerdata SET password='$newpass' WHERE id='$id'";
				if($conn->query($sql) === TRUE)
				{
				session_unset();
							session_destroy();
							session_start();
							$_SESSION['loginStatus']="Password Updated";
							$_SESSION['nextl']=5;
							header("Location: ../views/sellerlogin.php");
			}			
			}}
			else
			{
				$_SESSION['passchangeStatus']="Error";
							header("Location: ../views/recovarypassword.php");
			}
			if($errorcount!=0)
			{
				header("Location: ../views/recovarypassword.php");
				$_SESSION['passchangeStatus']="";
			}
		}



$_SESSION['nextr']=0;

}
	
	



?>
