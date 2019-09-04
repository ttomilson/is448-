"use strict";
window.onload = pageLoad;

function pageLoad(){
    $("submitbutton").onclick = checkForms;
    $("viewbutton").onclick = showInfo;
    $("logout").onclick = logout;

}


function checkForms(){
    var messagecontent = document.getElementById("messagecontent").value;
    var subject = $("subjectcontent").value;
    var username = $("recipientname").value;

    if ((messagecontent != '') &&  (subject != '') && (username !=''))  {

    }

    else{
      var flag = '';
          if (username == ''){
            flag += "The username textbox was left empty. ";

          }
          if (messagecontent == '') {
               flag += "The message textbox was left empty. ";
           }
         if (subject == ''){
               flag += "The subject textbox was left empty. ";
             }
        alert(flag + "Please fill it out.");
        return false;

    }

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

function logout(){
  var l = confirm("Are you sure you want to log out?");

  if (l == false){
    return false;
  }


}
