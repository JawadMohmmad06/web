<?php
session_start();
require '../Controller/header.php';
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['nextfp']!=1)
{
	header("Location: ../views/sellerfotgertpass.php");
}
else{
	
		
		$count1=0;
			$errorcount=0;
			if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$sq = isset($_POST['sq']) ? test_input($_POST['sq']):NULL;
			$sqt = test_input($_POST['sqt']);
			$Username = test_input($_POST['username']);
			$_SESSION['sqt']=$sqt;
			$_SESSION['Username']=$Username;
			if(empty($sqt)){
				$_SESSION['sqtErr']= "Security Question is empty";
				$errorcount++;
			}
			else
			{
				$_SESSION['sqtErr']= "";
			}


			if(empty($Username)){
				$_SESSION['usernameErrMsg'] = "Username is Empty";
				$errorcount++;
			}	
			else
			{
				$_SESSION['usernameErrMsg'] = "";
			}
			
			if($errorcount==0 and $Username!="" and $sqt!=""){
				$conn = connect();
				
				$sql = "SELECT * FROM sellerdata WHERE username='$Username' and sqt='$sqt' and sq='$sq'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				

				$count = mysqli_num_rows($result);

				    if($count===1)			
					{
						$_SESSION['id']=$row["id"];
						header("Location: ../views/recovarypassword.php");
							
					}
					else
					{
						header("Location: ../views/sellerfotgertpass.php");
						$_SESSION['status']="Information Mismatch";
					}
								
			}
			if($errorcount!=0)
			{
				header("Location: ../views/sellerfotgertpass.php");
				$_SESSION['status']="";
			}
		
	}


}


require '../Controller/fotter.php';
$_SESSION['nextfp']=0;
?>
