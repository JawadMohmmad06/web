function validate(pForm) {
	let flag = 0;

	if (pForm.password.value === "") {
		document.getElementById("passErrMsg").innerHTML = "Please fill up the Old Password";
		flag ++;
	}
	else
	{
		document.getElementById("passErrMsg").innerHTML = "";
		
	}

	if (pForm.newpassword.value === "") {
		document.getElementById("newpassErrMsg").innerHTML = "Please fill up the New Password";
		flag ++;
	}
	else
	{
		document.getElementById("newpassErrMsg").innerHTML = "";
		
	}
	if (pForm.confirmpassword.value === "") {
		document.getElementById("usernameErrMsg").innerHTML = "Please fill up the Confirm password";
		flag ++;
	}
	else
	{
		document.getElementById("usernameErrMsg").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}