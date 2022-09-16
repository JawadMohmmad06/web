<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['nextcp']!=1)
{
	header("Location: ../views/sellerpasswordupdate.php");
}
else
{







if(isset($_SESSION['id']))
	{
	$id=$_SESSION['id'];}
	elseif (isset($_COOKIE['id'])) {
		

		$id=$_COOKIE['id'];
		
	}




$errorcount=0;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
$conn = connect();
$Password = test_input($_POST['password']);
							$newpassword = test_input($_POST['newpassword']);
							$cpassword = test_input($_POST['confirmpassword']);
$sql = "SELECT * FROM sellerdata WHERE id='$id'";
$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				

				$count = mysqli_num_rows($result);
				if ($count > 0)
				{
					$mainpass=$row['password'];

					}
						
						


						
							if(empty($Password)){
								$_SESSION['passErrMsg'] = "Old Password is Empty";
								$errorcount++;
							}
							else
							{
								if($Password!=$mainpass)
								{
									$_SESSION['passErrMsg'] = "Old Password Does Not Match";
									$errorcount++;
								}
								else
								{
									$_SESSION['passErrMsg'] = "";
								}
							}


							if(empty($newpassword)){
								$_SESSION['newpassErrMsg'] = "New Password is Empty";
								$errorcount++;
							}
							else
							{
								$_SESSION['newpassErrMsg'] = "";
							}
							if(empty($cpassword)){
								$_SESSION['cpassErrMsg'] = "Old Password is Empty";
								$errorcount++;
							}
							else
							{
								if($newpassword!=$cpassword)
								{
									$_SESSION['cpassErrMsg'] = "New password and Cofirm Password does not match";
									$errorcount++;
								}
								else
								{
									$_SESSION['cpassErrMsg'] = "";
								}
							}
							if($errorcount==0)
							{
								
						
							$sql="UPDATE sellerdata SET password='$newpassword' WHERE id='$id'";
							if($conn->query($sql) === TRUE)
				{
							$_SESSION['uppdateStatus']="Password Updated";
							header("Location: ../views/sellerpasswordupdate.php");}
							}
							else
							{
								$_SESSION['uppdateStatus']="Unsuccessful";
								header("Location: ../views/sellerpasswordupdate.php");
							}
						
							




$_SESSION['nextcp']=0;
						
					
	}				

}







?>

