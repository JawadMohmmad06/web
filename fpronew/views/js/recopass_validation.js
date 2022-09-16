function validate(pForm) {
	let flag = 0;

	if (pForm.newpassword.value === "") {
		document.getElementById("newpassErr").innerHTML = "Please fill up the New Password";
		flag ++;
	}
	else
	{
		document.getElementById("newpassErr").innerHTML = "";
		
	}

	if (pForm.retypepassword.value === "") {
		document.getElementById("retypepassErr").innerHTML = "Please fill up the Confirm Password";
		flag ++;
	}
	else
	{
		document.getElementById("retypepassErr").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}