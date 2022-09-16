<?php
session_start();
require '../Controller/datasen.php';
require '../model/Connection.php';
if($_SESSION['nextap']!=1)
{
	header("Location: ../views/productadd.php");
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

		$pname = test_input($_POST['pname']);
		$price = test_input($_POST['price']);
		$quantity = test_input($_POST['quantity']);
		$des = test_input($_POST['des']);
		$_SESSION['pname']=$pname;
		$_SESSION['price']=$price;
		$_SESSION['quantity']=$quantity;
		$_SESSION['des']=$des;

		if(empty($pname)){
			$_SESSION['pnameErrMsg'] = "Product Name is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[a-zA-Z-' ]*$/",$pname)) {
				$errorcount++;
				$_SESSION['pnameErrMsg'] = "Only letters and spaces";
			}
			else
			{
				$_SESSION['pnameErrMsg'] = "";
			}}
			if(empty($des)){
			$_SESSION['desErrMsg'] = "Description is Empty";
			$errorcount++;
		}
		else
		{
			$_SESSION['desErrMsg'] = "";
		}
		
			if(empty($price)){
			$_SESSION['priceErrMsg'] = "Price is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[0-9]*$/",$price)) {
				$errorcount++;
				$_SESSION['priceErrMsg'] = "Only letters and spaces";}
				else 
				{
					$_SESSION['priceErrMsg'] = "";
				}}
				if(empty($quantity)){
			$_SESSION['quantityErrMsg'] = "Price is Empty";
			$errorcount++;
		}
		else{
			if (!preg_match("/^[0-9]*$/",$quantity)) {
				$errorcount++;
				$_SESSION['quantityErrMsg'] = "Only letters and spaces";}
				else
				{
					$_SESSION['quantityErrMsg'] = "";
				}}
			

			if($errorcount==0){
				$conn = connect();
			$sql="INSERT INTO productdata(id,pname,price,quantity,descip) VALUES ('$id','$pname','$price','$quantity','$des')";
			if ($conn->query($sql) === TRUE){
				$_SESSION['productStatus']="Product Info sent Successfull";
			header("Location: ../views/productadd.php");
			}
			else
			{
				$_SESSION['productStatus']="Product Infosending failed";
			header("Location: ../views/productadd.php");

			}
		}

		else{
			$_SESSION['productStatus']="Product Infosending failed";
			header("Location: ../views/productadd.php");
		}	





$_SESSION['nextap']=0;


	}






?>