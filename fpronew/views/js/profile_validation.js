function validate(pForm) {
	let flag = 0;

	if (pForm.username.value === "") {
		document.getElementById("usernameErrMsg").innerHTML = "Please fill up the USername";
		flag ++;
	}
	else
	{
		document.getElementById("usernameErrMsg").innerHTML = "";
		
	}

	if (pForm.firstname.value === "") {
		document.getElementById("firstnameErrMsg").innerHTML = "Please fill up the First Name";
		flag ++;
	}
	else
	{
		document.getElementById("firstnameErrMsg").innerHTML = "";
		
	}
	if (pForm.lastname.value === "") {
		document.getElementById("lastnameErrMsg").innerHTML = "Please fill up the Last Name";
		flag ++;
	}
	else
	{
		document.getElementById("lastnameErrMsg").innerHTML = "";
		
	}
	if (pForm.gender.value === "") {
		document.getElementById("genderErrMsg").innerHTML = "Please select Gender";
		flag ++;
	}
	else
	{
		document.getElementById("genderErrMsg").innerHTML = "";
		
	}
	if (pForm.email.value === "") {
		document.getElementById("emailErrMsg").innerHTML = "Please fill up the Email";
		flag ++;
	}
	else
	{
		document.getElementById("emailErrMsg").innerHTML = "";
		
	}
	if (pForm.mobileno.value === "") {
		document.getElementById("mobileErrMsg").innerHTML = "Please fill up the Mobile Number";
		flag ++;
	}
	else
	{
		document.getElementById("mobileErrMsg").innerHTML = "";
		
	}
	if (pForm.addres.value === "") {
		document.getElementById("addressErrMsg").innerHTML = "Please fill up the Adress";
		flag ++;
	}
	else
	{
		document.getElementById("addressErrMsg").innerHTML = "";
		
	}
	if (pForm.pickup.value === "") {
		document.getElementById("pickupErrMsg").innerHTML = "Please fill up the PickUp Adress";
		flag ++;
	}
	else
	{
		document.getElementById("pickupErrMsg").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}