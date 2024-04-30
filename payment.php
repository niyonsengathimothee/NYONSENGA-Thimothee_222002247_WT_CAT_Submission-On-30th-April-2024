<?php
include "menu.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>hostel reservation management system</title>
</head>
<body>
<center>
<h1><u> Payment form </u></h1>
<form method="post" action="payment_table.php">

<label for="payment_id"> payment_Id:</label>
<input type="number" payment_id="payment_id" name="payment_id"><br><br>

<label for="paymentmethod"> paymentmethod:</label>
<input type="paymentmethod" id="paymentmethod" name="paymentmethod" required><br><br>

<label for="paymentamount"> paymentamount :</label>
<input type="number" id="paymentamount" name="paymentamount" required><br><br>

<label for="paymentstatus"> paymentstatus :</label>
<input type="text" id="paymentstatus" name="paymentstatus" required><br><br>

<label for="paymentdate"> paymentdate :</label>
<input type="date" id="paymentdate" name="paymentdate" required><br><br>




<input type="submit" name="add" value="Insert"><br><br>

</form>

</center>

</body>
</html>