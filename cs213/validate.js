function calc()
{
   var tan = document.getElementById("tan");
   var blue = document.getElementById("blue");
   var grey = document.getElementById("grey");
   var red = document.getElementById("red");
   var brown = document.getElementById("brown");
   var total = 0;
   

   if (tan.checked) {
      mult = document.getElementById("quantityTan").value;
      total += mult * 5;

   }

   if (blue.checked) {
      mult = document.getElementById("quantityBlue").value;
      total += mult * 5;

   }
   
   if (grey.checked) {
      mult = document.getElementById("quantityGrey").value;
      total += mult * 5;

   }
   
   if (red.checked) {
      mult = document.getElementById("quantityRed").value;
      total += mult * 5;

   }
   
   if (brown.checked) {
      mult = document.getElementById("quantityBrown").value;
      total += mult * 5;
   }

   if (!tan.checked && !blue.checked && !grey.checked && !red.checked
       && !brown.checked){
      total = 0;      
   }
   document.getElementById("total").innerHTML = "$" +total.toFixed(2);
   
}

function checkTan()
{
   var tan = document.getElementById("tan");
   
   if (tan.checked) {
      return;
   }
   if (!tan.checked) {
      return tan.checked = true;
   }
}

function checkBlue()
{
   var blue = document.getElementById("blue");
   
   if (blue.checked) {
      return;
   }
   if (!blue.checked) {
      calc();
      return blue.checked = true;
   }
}

function checkGrey()
{
   var grey = document.getElementById("grey");
   
   if (grey.checked) {
      return;
   }
   if (!grey.checked) {
      calc();
      return grey.checked = true;
   }
}

function checkRed()
{
   var red = document.getElementById("red");
   
   if (red.checked) {
      return;
   }
   if (!red.checked) {
      calc();
      return red.checked = true;
   }
}

function checkBrown()
{
   var brown = document.getElementById("brown");
   
   if (brown.checked) {
      return;
   }
   if (!brown.checked) {
      calc();
      return brown.checked = true;
   }
}

function validPhone()
{
   var pattern = /\d\d\d-\d\d\d-\d\d\d\d/;
   if (pattern.test(document.getElementById("phone").value))
   {
      document.getElementById("phone").style.backgroundColor="DarkSeaGreen";
      return true;
   }

   if (!pattern.test(document.getElementById("phone").value))
   {
      document.getElementById("phone").style.backgroundColor="LightCoral";
      return false;
   }
}

function validCC()
{
   var pattern = /^\d{16}$/;
   if (pattern.test(document.getElementById("cc#").value))
   {
      document.getElementById("cc#").style.backgroundColor="DarkSeaGreen";
      return true;
   }
   
   if (!pattern.test(document.getElementById("cc#").value))
   {
      document.getElementById("cc#").style.backgroundColor="LightCoral";
      return false;
   }
   
}

function validExp()
{
   if (document.getElementById("year").value > 2011)
   {
      document.getElementById("year").style.backgroundColor="DarkSeaGreen";
      document.getElementById("month").style.backgroundColor="DarkSeaGreen";
   }

   else
   {
      document.getElementById("year").style.backgroundColor="LightCoral";
      document.getElementById("month").style.backgroundColor="LightCoral";
   }
}

function validFirst()
{
   if (document.getElementById("firstName").value == null)
      document.getElementById("firstName").style.backgroundColor="LightCoral";
   else
      document.getElementById("firstName").style.backgroundColor="DarkSeaGreen";
}

function validLast()
{
   if (document.getElementById("lastName").value == null)
      document.getElementById("lastName").style.backgroundColor="LightCoral";
   else
      document.getElementById("lastName").style.backgroundColor="DarkSeaGreen";
}

function validAddress()
{
   if (document.getElementById("address").value == null
       || document.getElementById("address").value == "")
      document.getElementById("address").style.backgroundColor="LightCoral";
   else
      document.getElementById("address").style.backgroundColor="DarkSeaGreen";
}
