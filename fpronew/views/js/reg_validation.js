function validate(pForm) {
	let flag = 0;

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
	//gswgdsg
	if (pForm.gender.value === "") {
		document.getElementById("genderErrMsg").innerHTML = "Please check Gender";
		flag ++;
	}
	else
	{
		document.getElementById("genderErrMsg").innerHTML = "";
		
	}if (pForm.email.value === "") {
		document.getElementById("emailErrMsg").innerHTML = "Please fill up the Email";
		flag ++;
	}
	else
	{
		document.getElementById("emailErrMsg").innerHTML = "";
		
	}if (pForm.mobileNo.value === "") {
		document.getElementById("mobileErrMsg").innerHTML = "Please fill up the Mobile No";
		flag ++;
	}
	else
	{
		document.getElementById("mobileErrMsg").innerHTML = "";
		
	}if (pForm.address.value === "") {
		document.getElementById("addressErrMsg").innerHTML = "Please fill up the Adress";
		flag ++;
	}
	else
	{
		document.getElementById("addressErrMsg").innerHTML = "";
		
	}if (pForm.pickup.value === "") {
		document.getElementById("pickupErrMsg").innerHTML = "Please fill up the Pickup  Adress";
		flag ++;
	}
	else
	{
		document.getElementById("pickupErrMsg").innerHTML = "";
		
	}if (pForm.username.value === "") {
		document.getElementById("usernameErrMsg").innerHTML = "Please fill up the Username";
		flag ++;
	}
	else
	{
		document.getElementById("usernameErrMsg").innerHTML = "";
		
	}if (pForm.password.value === "") {
		document.getElementById("passwordErrMsg").innerHTML = "Please fill up the password";
		flag ++;
	}
	else
	{
		document.getElementById("passwordErrMsg").innerHTML = "";
		
	}if (pForm.againpassword.value === "") {
		document.getElementById("ApasswordErrMsg").innerHTML = "Please fill up the Confirm Password";
		flag ++;
	}
	else
	{
		document.getElementById("ApasswordErrMsg").innerHTML = "";
		
	}if (pForm.sqt.value === "") {
		document.getElementById("sqtErrMsg").innerHTML = "Please fill up the Security Question";
		flag ++;
	}
	else
	{
		document.getElementById("sqtErrMsg").innerHTML = "";
		
	}











	if (flag === 0) {
		return true;
	}
	return false;
}