function getFile()
{
   var file;
   var value = document.getElementById("city").value;

   if (value == 0)
      return null;
   else if (value == 1)
      file = "usa.txt";
   else if (value == 2)
      file = "canada.txt";
   else if (value == 3)
      file = "mexico.txt";
   else if (value == 4)
      file = "russia.txt";

   loadXML(file, "data");
}

function callXML()
{
   loadXML(document.getElementById("url"), "page")
}

function loadXML(str, data)
{

   var xmlhttp;
   if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
   }
   else
   {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }

   xmlhttp.onreadystatechange=function()
   {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
         document.getElementById(data).innerHTML=xmlhttp.responseText;
      }
   }
   xmlhttp.open("GET", str, true);
   xmlhttp.send();
}

