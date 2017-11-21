﻿window.onload = function() { 
   for (var i = 1; i <= 8 ; i++) { 
       var x = "folder" + i;
       if (getCookie("folder" + i) == 1) {
          document.getElementById("folder" + i).checked = 1; 
       }
   } 
}; 

function setCookie(cname, cvalue, exdays) {
   var d = new Date(); 
   d.setTime(d.getTime() + (exdays*24*60*60*1000)); 
   var expires = "expires = "+d.toUTCString(); 
   document.cookie = cname + " = " + cvalue + "; " + expires; 
} 

function getCookie(cname) { 
   var name = cname + "="; 
   var ca = document.cookie.split('; '); 
   for (var i = 0; i < ca.length; i++) { 
       var c = ca[i];
       while (c.charAt(0) == ' ') 
          c = c.substring(1); 
       if (c.indexOf(name) !=  -1) 
          return c.substring(name.length,c.length); 
   } 
   return ""; 
} 

function check() { 
   for (var i = 1; i <= 8; i++) { 
       if (document.getElementById("folder" + i).checked == 1)
          setCookie("folder" + i, 1, 1); 
       else 
          setCookie("folder" + i, 0, -1); 
   } 
}
