function validate(pForm) {
	let flag = 0;

	if (pForm.username.value === "") {
		document.getElementById("usernameErrMsg").innerHTML = "Please fill up the username";
		flag ++;
	}
	else
	{
		document.getElementById("usernameErrMsg").innerHTML = "";
		
	}

	if (pForm.password.value === "") {
		document.getElementById("passwordErrMsg").innerHTML = "Please fill up the password";
		flag ++;
	}
	else
	{
		document.getElementById("passwordErrMsg").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}