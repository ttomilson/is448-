"user strict";

window.onload = pageLoad;

function pageLoad (){
  $("messagebackground").onmouseover = changeBackground;
  $("messagebackground").onmouseout = changeBackground;
  document.getElementById("logout").onclick = confirmLogout;

}

function replyMessage (){
  new Ajax.Request ("reply.php",
  {
      method: "get",
      parameters: {},
      onSuccess: displayResult,
  }
  );

}

function displayResult(ajax){
  $("reply").innerHTML = ajax.responseText;
}

function changeBackground (){
  var dom=document.getElementById("messagebackground");
  //alert(event.type);

  if(event.type == "mouseover"){

     dom.style.backgroundColor='#E0C327';
  }
  else {
     dom.style.backgroundColor='#eeeeee';

  }
}

function confirmLogout(){
    var l = confirm("Are you sure you want to log out?");

    if (l == false){
      return false;
    }


}
