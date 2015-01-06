function calc()
{
   if (verify())
   {
      var percentage;
      if (document.getElementById("adjust").checked)
      {
         percentage = document.getElementById("percent").value;
      }
      else
      {
         percentage = .2;
      }
      var amount = document.getElementById("amount").value;

      percentage = parseFloat(percentage);
      amount = parseFloat(amount);

      if (percentage > 1)
      {
         percentage = parseFloat(percentage / 100);
      }

      var tip = Math.round((amount * percentage) * 100) / 100;
      var total = Math.round((amount + tip) * 100) / 100;

      document.getElementById("tip").value = tip;
      document.getElementById("total").value = total;
   }
}

function showPercent()
{
   if (document.getElementById("adjust").checked)
   {
      document.getElementById("percent").style.visibility = "visible";
      document.getElementById("label").style.visibility = "visible";
   }
   else
   {
      document.getElementById("percent").style.visibility = "hidden";
      document.getElementById("label").style.visibility = "hidden";
   }
}

function verify()
{
   var amount = document.getElementById("amount").value;
   var adjust = document.getElementById("adjust");
   var percent = document.getElementById("percent").value;
   var isValid = true;

   if ( amount == "" || amount < 0)
   {
      document.getElementById("amount").style.backgroundColor="LightCoral";
      isValid = false;
   }

   else
   {
      document.getElementById("amount").style.backgroundColor="DarkSeaGreen";
   }

   if (adjust.checked)
   {
      if (percent == "" || percent < 0)
      {
         document.getElementById("percent").style.backgroundColor="LightCoral"
            isValid = false;
      }
      
      else
      {
         document.getElementById("percent").style.backgroundColor="DarkSeaGreen";
      }
   }

   return isValid;
}
