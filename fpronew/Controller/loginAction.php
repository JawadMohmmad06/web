<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['nextl']!=1)
{
	header("Location: ../views/sellerlogin.php");
}
else
{
			$count1=0;
			$errorcount=0;
			if ($_SERVER['REQUEST_METHOD'] === "POST"){
			
			$Password = test_input($_POST['password']);
			$Username = test_input($_POST['username']);


			 $_SESSION['Password']=$Password;
			 $_SESSION['Username']=$Username;
			$rm = isset($_POST['rm']) ? test_input($_POST['rm']):NULL;
			if(empty($Password)){
				$_SESSION['passwordErrMsg'] = "Password is Empty";
				$_SESSION['loginStatus']="";
				$errorcount++;
			}
			if(empty($Username)){
				$_SESSION['usernameErrMsg'] = "Username is Empty";
				$_SESSION['loginStatus']="";
				$errorcount++;
			}
			else{
				$_SESSION['usernameErrMsg'] = "";
			}	
			
			if($errorcount==0 and $Username!="" and $Password!=""){
				$conn = connect();
				
				$sql = "SELECT * FROM sellerdata WHERE username='$Username' and password='$Password'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				

				$count = mysqli_num_rows($result);

				    if($count===1)			
					{
						$_SESSION['id']=$row['id'];
						if($rm!=null)
								{
									setcookie("id",$row['id'],time()+10000,"/");
									
								}

						$_SESSION['usernameErrMsg']="";
						$_SESSION['passwordErrMsg']="";
						header("Location: ../views/welcome.php");
					}
					else
					{ 
						$_SESSION['usernameErrMsg']="";
						$_SESSION['passwordErrMsg']="";
						header("Location: ../views/sellerlogin.php");
						$_SESSION['loginStatus']="Invalid Username or Password";
					}





			}
			if($errorcount!=0)
			{
				header("Location: ../views/sellerlogin.php");
			}
		}

$_SESSION['nextl']=0;
}















?>