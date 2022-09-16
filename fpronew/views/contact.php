<?php
session_start();

if(!isset($_SESSION["id"]))
{
	if(!isset($_COOKIE["id"])){
	header("Location: ../views/sellerlogin.php");}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
	<script src="js/contact_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<script src="js/contactChat.js"></script>
</head>
<body>

<div id="main">
<?php
require '../Controller/headin.php';
$cmntErrMsg =$nameErrMsg = $phnErrMsg = $emailErrMsg = "";
$cmntStatus="";

if(isset($_SESSION['nextc']))
{
	if($_SESSION['nextc']==0)
	{
		$cmntErrMsg =$_SESSION['cmntErrMsg'];
		$nameErrMsg=$_SESSION['nameErrMsg'];
		$phnErrMsg = $_SESSION['phnErrMsg'];
		$emailErrMsg = $_SESSION['emailErrMsg'];
        $cmntStatus=$_SESSION['cmntStatus'];

	}
}




?>




 <div id="form">
	<form action="../Controller/contactAction.php" method="POST" novalidate onsubmit="return validate(this);">
<fieldset>
	<legend>Contact Us</legend>
	<label for="name">Name</label>
	<input type="text" name="name" id="name" autofocus>
	<center>
	<span id="nameErrMsg"></span>
			<span style="color: red">
		<?php
			echo $nameErrMsg;
		?>
		</span>
		</center>
	<br><br>
	<label for="phn">Phone Number</label>
	<input type="text" name="phn" id="phn">
	<center>
	<span id="phnErrMsg"></span>
			<span style="color: red">
		<?php
			echo $phnErrMsg;
		?>
		</span>
		</center>
	<br><br>
	<label for="email">Email</label>
	<input type="email" name="email" id="email">
	<center>
	<span id="emailErrMsg"></span>
			<span style="color: red">
		<?php
			echo $emailErrMsg;
		?>
		</span>
		</center>
	<br><br>
	<label >Comment</label><br>
	<textarea name="cmnt" id="cmnt" rows="10" cols="30"></textarea>
	<center>
	<span id="cmntErrMsg"></span>
			<span style="color: red">
		<?php
			echo $cmntErrMsg;
		?>
		</span>
		</center>
	<br><br>
	<input type="submit" name="submit" value="Send" id="submit">
</fieldset>

</form>


<h1><?php
			echo $cmntStatus;
?></h1>
</div>
 </div>
<div id="chata">
<p id="live">Live chat</p>
<form action="" method="POST" onsubmit="return givechat(this)">
	<input type="text" name="chat" id="chat">
	<input type="submit" name="submit" id="submit">
</form>
<p id="e"></p>
<script type="text/javascript">see()</script>
<p id="w"></p>
<p id="demo"></p>

</div>

<div id="foot">
<?php
require '../Controller/fotter.php';
$_SESSION['nextc']=1;

?>

</div>
</body>
</html>
