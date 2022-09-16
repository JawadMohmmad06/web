function validate(pForm) {
	let flag = 0;

	if (pForm.pname.value === "") {
		document.getElementById("pnameErrMsg").innerHTML = "Please fill up the Product Name";
		flag ++;
	}
	else
	{
		document.getElementById("pnameErrMsg").innerHTML = "";
		
	}

	if (pForm.price.value === "") {
		document.getElementById("priceErrMsg").innerHTML = "Please fill up the Price";
		flag ++;
	}
	else
	{
		document.getElementById("priceErrMsg").innerHTML = "";
		
	}
	if (pForm.quantity.value === "") {
		document.getElementById("quantityErrMsg").innerHTML = "Please fill up the Quantity";
		flag ++;
	}
	else
	{
		document.getElementById("quantityErrMsg").innerHTML = "";
		
	}
	if (pForm.des.value === "") {
		document.getElementById("desErrMsg").innerHTML = "Please fill up the Description";
		flag ++;
	}
	else
	{
		document.getElementById("desErrMsg").innerHTML = "";
		
	}


	if (flag === 0) {
		return true;
	}
	return false;
}