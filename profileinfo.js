"user strict";

window.onload = pageLoad;

function pageLoad (){
  alert ("profile js");
  $("viewbutton").onclick = showInfo;
}

function showInfo(){
	var userinput = $("usernameInfo").value;

    if  (userinput == ''){
    alert ("Username not entered. Please input a username.");
    return false;
  }

  else{
    new Ajax.Request ("showinfo.php",
    {
        method: "get",
        parameters: {username: userinput},
        onSuccess: displayResult,
    }
    );
  }

}


function displayResult(ajax){
  $("inputProfile").innerHTML = ajax.responseText;
}

function displayFailure (ajax){
  alert ("Display failed");
}
