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

	if (pForm.sqt.value === "") {
		document.getElementById("sqtErr").innerHTML = "Please fill up the Sequrity qustuion";
		flag ++;
	}
	else
	{
		document.getElementById("sqtErr").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}