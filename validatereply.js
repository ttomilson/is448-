"user strict";
window.onload = pageLoad;

function pageLoad(){
    document.getElementById("submitbutton").onclick = checkForms;
    alert ("page load");
}

function checkForms(){
    alert ("check form");
    var messagecontent = $("messagecontent").value;
    var subject = $("subjectcontent").value;
    var recipient = $("recipientname").value;

    alert (messagecontent);
    alert(subject);
    if ((messagecontent != '') &&  (subject != '') &&(recipient != ''))  {
        new Ajax.Request ("messageInput0.php",
        {
            method: "get",
            parameters: {},
            onSuccess: displayResult,
        }
        );
    }
    else{
      var flag = '';
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

function displayResult(ajax){
  $("forms").innerHTML = ajax.responseText;

}
