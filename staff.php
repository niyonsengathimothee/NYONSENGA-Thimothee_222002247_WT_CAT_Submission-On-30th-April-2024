<?php
include "menu.php";
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$staff_id=$_POST['staff_id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	$payment_id=$_POST['payment_id'];
	$sql="INSERT INTO staff (staff_id,fname,lname,email,telephone,payment_id) VALUES ('$staff_id','$fname','$lname','$email','$telephone','$payment_id')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:staff_table.php");
		exit();
	}else{
		echo "Inserted fail";
	}
}
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
<h1><u> staff Form </u></h1>
<form method="post" action="">

<label for="staff_id"> staff_Id:</label>
<input type="number" customer_id="staff_id" name="staff_id"><br><br>

<label for="fname"> fname:</label>
<input type="text" id="fname" name="fname" required><br><br>

<label for="lname"> lname :</label>
<input type="text" id="lname" name="lname" required><br><br>

<label for="email"> email :</label>
<input type="email" id="email" name="email" required><br><br>

<label for="telephone"> telephone :</label>
<input type="number" id="telephone" name="telephone" required><br><br>

<label for="payment_id"> payment_id :</label>
<input type="number" id="payment_id" name="payment_id" required><br><br>

<input type="submit" name="add" value="Insert"><br><br>

</form> 
</center>

</body>
</html>