function calc()
{
   var x = document.getElementById("apr").value;
   var y = document.getElementById("term").value;
   var z = document.getElementById("amount").value;

   x = parseFloat(x);
   y = parseFloat(y);
   z = parseFloat(z);

   y = y*12;
   x = (x/12)/100;
   pay = (x*z)/(1-Math.pow(1+x,-y));
   pay = "$" +pay.toFixed(2);
   document.getElementById("result").innerHTML = pay;

}

function aprEmpty()
{
   if (document.data.apr.value == "")
      return true;
   else
      return false;
}

function termEmpty()
{
   if (document.data.term.value == "")
      return true;
   else
      return false;
}

function amountEmpty()
{
   if (document.data.amount.value == "")
      return true;
   else
      return false;
}

function checkValues()
{
   if (aprEmpty() || termEmpty() || amountEmpty())
      alert("One or more input field is empty!");
}