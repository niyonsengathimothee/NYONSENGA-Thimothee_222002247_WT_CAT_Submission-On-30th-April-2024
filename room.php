<?php
include "menu.php";
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Roomtype=$_POST['Roomtype'];
	$Pricepernight=$_POST['Pricepernight'];
	$Description=$_POST['Description'];
	$customer_id=$_POST['customer_id'];
	$sql="INSERT INTO room (Roomtype,Pricepernight,Description,customer_id) VALUES ('$Roomtype','$Pricepernight','$Description','$customer_id')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:room_table.php");
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
<h1><u> room Form </u></h1>
<form method="post" action="">

<label for="roomtype">roomtype:</label>
<input type="text" roomtype="roomtype" name="Roomtype"><br><br>

<label for="pricepernight">pricepernight:</label>
<input type="number" id="pricepernight" name="Pricepernight" required><br><br>

<label for="description">description:</label>
<input type="text" id="description" name="Description" required><br><br>

<label for="customer_id">customer_id:</label>
<input type="text" id="customer_id" name="customer_id" required><br><br>
<input type="submit" name="submit" value="Insert"><br><br>

</form>

</center>

</body>
</html>