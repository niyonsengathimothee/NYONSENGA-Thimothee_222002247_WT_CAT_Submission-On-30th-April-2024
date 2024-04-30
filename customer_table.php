<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revenue System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold;">HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF CUSTOMER IN OUR SYSTEM</h4>
        <a href="customer_form.php" class="btn btn-primary" style="margin-top: 0px;">New Customer</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table class="table table-bordered">
            <thead class="bg-warning">
<?php
// Connection details
include "dbconnection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
 $stmt = $connection->prepare("INSERT INTO customer (customer_id, fname, lname, email, telephone) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issiii", $customer_id, $fname, $lname, $email, $telephone);

// Set parameters
$customer_id = $_POST['customer_id'];
$fname = $_POST['fname'];    
$lname = $_POST['lname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];  

// Execute the statement
if ($stmt->execute()) {
    echo "New record has been added successfully";
} else {
    echo "Error: " . $stmt->error;
}
    // Close the statement
    $stmt->close();

}
// SQL query to fetch data from the car table
$sql = "SELECT * FROM customer";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
         footer{
    height: 50px;
    text-align: center;
    padding: 25px;
    color: white;
    background-color: blue;
}
    </style> 
</head>
<body>
    <center><h2></h2></center>
    <table border="5">
        <table border="8">
        <tr>
            <th>customer_id</th>
            <th>fname</th>
            <th>lname</th>
            <th>email</th>
            <th>telephone</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php

        // Check if there are any cars
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $customer_id = $row['customer_id']; // Fetch the customer_id
                echo "<tr>
                    <td>" . $row['customer_id'] . "</td>
                    <td>" . $row['fname'] . "</td>
                    <td>" . $row['lname'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['telephone'] . "</td>
             <td><a style='padding:4px' href='deletecustomer.php?customer_id={$row['customer_id']}'>Delete</a></td>
                <td><a style='padding:4px' href='update_customer.php?customer_id={$row['customer_id']}'>edit</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>
</html>

</section>
  
<footer><!-- Footer section -->
            <p>&copy &reg 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
        </center></footer><!-- Footer section -->
    </body>
    </html>