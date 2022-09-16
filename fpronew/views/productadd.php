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
	<title>Add Product</title>
	<script src="js/addproduct_validation.js"></script>
	<link rel="stylesheet" type="text/css" href="css/addProduct.css">
</head>
<body>
<div id="main">
<?php
require '../Controller/headin.php';
		$pnameErrMsg = $priceErrMsg = $quantityErrMsg =$desErrMsg = "";
$productStatus="";
		$pname = "";
		$price = "";
		$quantity = "";
		$des = "";
if(isset($_SESSION['nextap']))
{
	if($_SESSION['nextap']==0)
	{
		$pnameErrMsg =$_SESSION['pnameErrMsg'];
		 $priceErrMsg =$_SESSION['priceErrMsg'];
		  $quantityErrMsg =$_SESSION['quantityErrMsg'];
		  $desErrMsg =$_SESSION['desErrMsg'];
$productStatus=$_SESSION['productStatus'];
		$pname=$_SESSION['pname'];
		$price=$_SESSION['price'];
		$quantity=$_SESSION['quantity'];
		$des=$_SESSION['des'];
	}
}



?>


<div id="form">
<form action="../Controller/productAddAction.php" method="POST" novalidate onsubmit="return validate(this);">
<fieldset>
	<legend>Add Product</legend>
	<label for="pname">Product Name</label>
	<input type="text" name="pname" id="pname" value="<?php echo $pname ?>">
	<span id="pnameErrMsg"></span>
	<span style="color: red">
		<?php
			echo $pnameErrMsg;
		?>
	</span>
	<br><br>
	<label for="price">Price</label>
	<input type="number" name="price" id="price" value="<?php echo $price ?>">
	<center>
	<span id="priceErrMsg"></span>
	<span style="color: red">
		<?php
			echo $priceErrMsg;
		?>
	</span>
	</center>
	<br><br>
	<label for="quantity">Quantity</label>
	<input type="number" name="quantity" id="quantity" value="<?php echo $quantity ?>">
	<center>
	<span id="quantityErrMsg"></span>
	<span style="color: red">
		<?php
			echo $quantityErrMsg;
		?>
	</span>
	</center>
	<br><br>
	<label >Product Description</label><br>
	<textarea name="des" id="des" rows="10" cols="30" value="<?php echo $des ?>"></textarea>
	<span id="desErrMsg"></span>
			<span style="color: red">
		<?php
			echo $desErrMsg;
		?>
	</span>
		<br><br>
		<input type="submit" name="submit" value="Add" id="submit">
</fieldset>

</form>


<?php
			echo $productStatus;
		?>
		</div>
		</div>
		<div id="foot">
		<?php
$_SESSION['nextap']=1;
require '../Controller/fotter.php';

?>
</div>
</body>
</html>
