function setVisible()
{
   if (document.getElementById("duet").checked)
   {
      document.getElementById("firstName2").style.visibility = "visible";
      document.getElementById("lastName2").style.visibility = "visible";
      document.getElementById("studentID2").style.visibility = "visible";
   }
   else
   {
      document.getElementById("firstName2").style.visibility = "hidden";
      document.getElementById("lastName2").style.visibility = "hidden";
      document.getElementById("studentID2").style.visibility = "hidden";
   }
}

function buildQuery()
{
   var query;
   var type;

   if (document.getElementById("solo").checked)
      type = document.getElementById("solo").value;
   
   if (document.getElementById("duet").checked)
      type = document.getElementById("duet").value;

   if (document.getElementById("concerto").checked)
      type = document.getElementById("concerto").value;
           
   query = "?type=" +
      type +
      "&firstName=" +
      document.getElementById("firstName").value +
      "&lastName=" +
      document.getElementById("lastName").value +
      "&studentID=" +
      document.getElementById("studentID1").value +
      "&firstName2=" +
      document.getElementById("firstName2").value +
      "&lastName2=" +
      document.getElementById("lastName2").value +
      "&studentID2=" +
      document.getElementById("studentID2").value +
      "&skill=" +
      document.getElementById("skill").value +
      "&instrument=" +
      document.getElementById("instrument").value +
      "&location=" +
      document.getElementById("location").value +
      "&room=" + 
      document.getElementById("room").value +
      "&time=" +
      document.getElementById("time").value;

   //document.getElementById("data").innerHTML = query;

   return query;
}

function validate()
{
   if (!document.getElementById("solo").checked &&
       !document.getElementById("duet").checked &&
       !document.getElementById("concerto").checked)
      return false;

   if (document.getElementById("firstName").value == "" ||
       document.getElementById("lastName").value == "" ||
       document.getElementById("studentID1").value == "")
      return false;

   if (document.getElementById("duet").checked &&
       (document.getElementById("firstName2").value == "" ||
        document.getElementById("lastName2").value == "" ||
        document.getElementById("studentID2").value == ""))
       return false;

   else
      return true;
}

function validID(num)
{
   var pattern = /\d\d-\d\d\d-\d\d\d\d/;
   if (pattern.test(document.getElementById("studentID" + num).value))
   {
      document.getElementById("studentID" + num).style.backgroundColor="DarkSeaGreen";
      return true;
   }

   if (!pattern.test(document.getElementById("studentID" + num).value))
   {
      document.getElementById("studentID" + num).style.backgroundColor="LightCoral";
      alert("No, no, no! Not like that! Like this:\n\tXX-XXX-XXXX\t");
      return false;
   }
}

function display()
{
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
   {
      var data =
         '<table border="1" style="text-align:left">' +
         '  <tr>' +
         '    <th>Type</th>' +
         '    <th>First Name</th>' +
         '    <th>Last Name</th>' +
         '    <th>Student ID</th>' +
         '    <th>Skill</th>' +
         '    <th>Instrument</th>' +
         '    <th>Location</th>' +
         '    <th>Room #</th>' +
         '    <th>Time</th>' +
         '  </tr>';

      var xml = xmlhttp.responseXML.documentElement;

      var type = xml.getElementsByTagName("type");
      var firstName = xml.getElementsByTagName("firstName");
      var lastName = xml.getElementsByTagName("lastName");
      var studentID = xml.getElementsByTagName("studentID");
      var firstName2 = xml.getElementsByTagName("firstName2");
      var lastName2 = xml.getElementsByTagName("lastName2");
      var studentID2 = xml.getElementsByTagName("studentID2");
      var skill = xml.getElementsByTagName("skill");
      var instrument = xml.getElementsByTagName("instrument");
      var location = xml.getElementsByTagName("location");
      var room = xml.getElementsByTagName("room");
      var time = xml.getElementsByTagName("time");
      
      for (i = 0; i < type.length; i++)
      {
         data += "<tr>" +
            "  <td>" + type[i].childNodes[0].nodeValue + "</td>";
         
         if (type[i].childNodes[0].nodeValue == "Duet")
         {
            data += "  <td>" + firstName[i].childNodes[0].nodeValue +
                     "<br/>" + firstName2[i].childNodes[0].nodeValue + "</td>" +
                    "  <td>" + lastName[i].childNodes[0].nodeValue +
                     "<br/>" + lastName2[i].childNodes[0].nodeValue + "</td>" +
                    "  <td>" + studentID[i].childNodes[0].nodeValue +
                     "<br/>" + studentID2[i].childNodes[0].nodeValue + "</td>";
         }
         
         if (type[i].childNodes[0].nodeValue != "Duet")
         {
            data += "  <td>" + firstName[i].childNodes[0].nodeValue + "</td>" +
               "  <td>" + lastName[i].childNodes[0].nodeValue + "</td>" +
               "  <td>" + studentID[i].childNodes[0].nodeValue + "</td>";
         }

         data +=
            "  <td>" + skill[i].childNodes[0].nodeValue + "</td>" +
            "  <td>" + instrument[i].childNodes[0].nodeValue + "</td>"+
            "  <td>" + location[i].childNodes[0].nodeValue + "</td>" +
            "  <td>" + room[i].childNodes[0].nodeValue + "</td>" +
            "  <td>" + time[i].childNodes[0].nodeValue + "</td>" +
            "</tr>";
      }
      
      data += '</table>';
      
      document.getElementById("data").innerHTML = data;
   }
   
}

function loadXML(query)
{
   var CGI = "/../../cgi-bin/sma09002/assign13.rb";
   
   if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   }
   else {// code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }

   xmlhttp.onreadystatechange = function() {display()};

   xmlhttp.open("GET", CGI+query, true);
   xmlhttp.send(null);
}

function initialize()
{
   var query;
   
   if (validate())
   {
      query = buildQuery();
      loadXML(query);
   }

   else
      alert("AW Shoot! Did you forget something?");
}