<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Currency Fair Logical Test Home Page</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <form id="signup" name="myForm" action="json-data.php" onsubmit="return checkInp()" method="post">
        <div class="header">
            <h3>Currency Conversion</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs">
		    <input type="hidden" name="userid" value="<?php echo rand();?>" />
            <input type="text" autofocus class="txt1" readonly="true" name="from" value="EURO"/>
            <input type="text" autofocus class="txt2" readonly="true" value="GBP" name="currencyTo"/>
			<input type="text" placeholder="Amount"  autofocus name="amount"/>
			<input type="hidden" name="date" value="<?php echo date("j-F-Y h:i:s A");?>" />
			<input type="hidden" name="rate" value="0.7471" />			 
			<input type="hidden" name="country" value="FR"  />
			<input type="submit" value="Get Started" id="submit"> 
        </div>
      </div>
   </form>
<script>
function checkInp()
{
  var x=document.forms["myForm"]["amount"].value;
  if (isNaN(x) || x == 0) 
  {
    alert("Please Enter valid Numbers");
    return false;
  }
}

</script>
</body>
</html>
