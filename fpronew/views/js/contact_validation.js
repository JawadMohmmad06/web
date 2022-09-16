function validate(pForm) {
	let flag = 0;

	if (pForm.name.value === "") {
		document.getElementById("nameErrMsg").innerHTML = "Please fill up the Name";
		flag ++;
	}
	else
		
	{
		document.getElementById("nameErrMsg").innerHTML = "";
		
	}

	if (pForm.phn.value === "") {
		document.getElementById("phnErrMsg").innerHTML = "Please fill up the Phone Number";
		flag ++;
	}
	else
	{
		document.getElementById("phnErrMsg").innerHTML = "";
		
	}
	if (pForm.email.value === "") {
		document.getElementById("emailErrMsg").innerHTML = "Please fill up the Email";
		flag ++;
	}
	else
	{
		document.getElementById("emailErrMsg").innerHTML = "";
		
	}
	if (pForm.cmnt.value === "") {
		document.getElementById("cmntErrMsg").innerHTML = "Please fill up the Comment";
		flag ++;
	}
	else
	{
		document.getElementById("cmntErrMsg").innerHTML = "";
		
	}

	if (flag === 0) {
		return true;
	}
	return false;
}