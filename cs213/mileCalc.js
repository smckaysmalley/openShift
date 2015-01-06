var xmlhttp;

function buildQuery() {
   var query;
   query = "?startCity=" + 
      document.getElementById("startCity").value + "&startState=" +
      document.getElementById("startState").value + "&endCity=" +
      document.getElementById("endCity").value + "&endState=" +
      document.getElementById("endState").value;
   return query;
}

function display()
{
   if (xmlhttp.readyState == 4)
   {
      var xml = xmlhttp.responseXML.documentElement;
      
      var startCity = xml.getElementsByTagName("startcity")[0].firstChild.data;
      var startState = xml.getElementsByTagName("startstate")[0].firstChild.data;
      var endCity = xml.getElementsByTagName("endcity")[0].firstChild.data;
      var endState = xml.getElementsByTagName("endstate")[0].firstChild.data;
      var distance = xml.getElementsByTagName("miles")[0].firstChild.data;
      var mode = xml.getElementsByTagName("tmode");
      
      var strmode = "<select>";
      for (i = 0; i < mode.length; i++)
      {
         strmode += "<option>" + mode[i].childNodes[0].nodeValue; + "</option>";
      }
      strmode += "</select>";
      
      var data = '<div class="a"><p>Start City: ' +
         startCity +
         '</p><p>Start State: ' +
         startState +
         '</p><p>End City: ' +
         endCity +
         '</p><p>End State: ' +
         endState +
         '</p><p>Distance: ' +
         distance +
         '</p><p>Travel Modes: ' +
         strmode +
         '</p><p></div>';
      
      document.getElementById("data").innerHTML = data;
   }
}

function calculate() {
 

   if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   }
   else {// code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   
   var query = buildQuery();
   var CGI = "/../../cgi-bin/ercanbracks/mileage/mileageAjaxXML";

   xmlhttp.onreadystatechange = function() {display()};
  
   xmlhttp.open("GET", CGI+query, true);
   xmlhttp.send(null); 
}