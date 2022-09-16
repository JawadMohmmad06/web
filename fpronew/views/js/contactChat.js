function givechat(pForm) {
  if (pForm.chat.value === "") {
    document.getElementById("e").innerHTML = "Please fill up the chat";
    return false;
  }
  else
  {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../Controller/sendChatAction.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send("q="+"Me: "+pForm.chat.value);
}}
setInterval( function see() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  setInterval(xhttp.open("GET", "../Controller/chatAction.php", true),2000);
  
  xhttp.send();
},2000);