"use strict";
window.onload = pageLoad;

function pageLoad(){
    document.getElementById("logout").onclick = confirmLogout;
}

function confirmLogout(){
  var l = confirm("Are you sure you want to log out?");

  if (l == false){
    return false;
  }


}
