<?php
include "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $customer_id = $_POST['customer_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Preparing SQL query using prepared statements for security
    $stmt = $connection->prepare("INSERT INTO customer (customer_id, fname, lname, email, telephone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $customer_id, $fname, $lname, $email, $telephone);

    // Executing SQL query
    if ($stmt->execute()) {
        // Redirecting to login page on successful registration
        header("Location: customer_table.php");
        exit();
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $stmt->error;
    }

    // Closing statement
    $stmt->close();
}

// Closing database connection
$connection->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Reservation Management System</title>
</head>
<body>
<center>
    <h1><u>Customer Form</u></h1>
    <form method="post" action="">
        <label for="customer_id">Customer ID:</label>
        <input type="number" id="customer_id" name="customer_id" required><br><br>

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telephone">Telephone:</label>
        <input type="number" id="telephone" name="telephone" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>
    </form>
</center>
</body>
</html>
