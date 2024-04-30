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
<h1><u> reservation form </u></h1>
<form method="post" action="reservation_table.php">

<label for="reservation_id"> reservation_id:</label>
<input type="number" id="reservation_id" name="reservation_id"><br><br>

<label for="customer_id"> customer_id:</label>
<input type="customer_id" id="customer_id" name="customer_id" required><br><br>

<label for="checkin_date"> checkindate :</label>
<input type="date" id="checkindate" name="checkin_date" required><br><br>

<label for="checkout_date"> checkoutdate :</label>
<input type="date" id="checkoutdate" name="checkout_date" required><br><br>

<label for="booking_date"> bookingdate :</label>
<input type="date" id="bookingdate" name="booking_date" required><br><br>

<label for="total_price"> totalprice :</label>
<input type="text" id="totalprice" name="total_price" required><br><br>

<input type="submit" name="add" value="Insert"><br><br>

</form>
</center>

</body>
</html>