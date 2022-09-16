<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['nextc']!=1)
{
	header("Location: ../views/contact.php");
}
else
{

	
	$errorcount=0;
	$count=0;

			if(isset($_SESSION['id']))
	{
	$id=$_SESSION['id'];}
	elseif (isset($_COOKIE['id'])) {
		

		$id=$_COOKIE['id'];
		
	}

		$name = test_input($_POST['name']);
		$phn = test_input($_POST['phn']);
		$email = test_input($_POST['email']);
		$cmnt = test_input($_POST['cmnt']);
		if(empty($name)){
			$_SESSION['nameErrMsg'] = "Name is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
				$errorcount++;
				$_SESSION['nameErrMsg'] = "Only letters and spaces";
			}
			else
			{
				$_SESSION['nameErrMsg'] = "";

			}}
			if(empty($email)){
			$_SESSION['emailErrMsg'] = "Email is Empty";
			$errorcount++;
		}
		else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errorcount++;
				$_SESSION['emailErrMsg'] = "correct email";
			}
			else
			{
				$_SESSION['emailErrMsg'] = "";
			}}
			if(empty($cmnt)){
			$_SESSION['cmntErrMsg'] = "Comment is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['cmntErrMsg'] = "";

		}
		if(empty($phn)){
			$_SESSION['phnErrMsg'] = "Mobile  is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[0-9]*$/",$phn)) {
				$errorcount++;
				$_SESSION['phnErrMsg'] = "Only Numbers";
			}
			else 
			{
				$_SESSION['phnErrMsg'] = "";

			}}

			if($errorcount==0){
			$conn = connect();
				$sql="INSERT INTO sellerdatacmnt2(id,name,phn,email,cmnt) VALUES ('$id','$name','$phn','$email','$cmnt')";
				if ($conn->query($sql) === TRUE)
				{
					$_SESSION['cmntStatus']="Comment sent Successfull";
			header("Location: ../views/contact.php");
				}
				else
				{
					$_SESSION['cmntStatus']="Comment sending failed";
			header("Location: ../views/contact.php");
				}


		}

		else{
			$_SESSION['cmntStatus']="Comment sending failed";
			header("Location: ../views/contact.php");
		}	





$_SESSION['nextc']=0;


	}




	?>
	

	

