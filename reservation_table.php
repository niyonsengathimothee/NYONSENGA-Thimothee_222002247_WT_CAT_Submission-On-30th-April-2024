s<?php
// Include database connection details
include "dbconnection.php";

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reservation_id'], $_POST['customer_id'], $_POST['checkin_date'], $_POST['checkout_date'], $_POST['booking_date'], $_POST['total_price'])) {
    $stmt = $connection->prepare("INSERT INTO reservation (reservation_id, customer_id, checkin_date, checkout_date, booking_date, total_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssi", $_POST['reservation_id'], $_POST['customer_id'], $_POST['checkin_date'], $_POST['checkout_date'], $_POST['booking_date'], $_POST['total_price']);
    
    if ($stmt->execute()) {
        echo "New record has been added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$result = $connection->query("SELECT * FROM reservation");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation List</title>
</head>
<body>
    <center>
              <h2 style="text-align: center; font-family: century; font-weight: bold;">HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF RESERVATION IN OUR SYSTEM</h4>
        <a href="reservation.php" class="btn btn-primary" style="margin-top: 0px;">New Reservation</a>
        <a href="home.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table border="8">
            <tr>
                <th>Reservation ID</th>
                <th>Customer ID</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Booking Date</th>
                <th>Total Price</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . htmlspecialchars($row['reservation_id']) . "</td>
                        <td>" . htmlspecialchars($row['customer_id']) . "</td>
                        <td>" . htmlspecialchars($row['checkin_date']) . "</td>
                        <td>" . htmlspecialchars($row['checkout_date']) . "</td>
                        <td>" . htmlspecialchars($row['booking_date']) . "</td>
                        <td>" . htmlspecialchars($row['total_price']) . "</td>
                        <td><a href='deletereservation.php?reservation_id=" . urlencode($row['reservation_id']) . "'>Delete</a></td>
                        <td><a href='update_reservation.php?reservation_id=" . urlencode($row['reservation_id']) . "'>Edit</a></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No data found</td></tr>";
            }
            $connection->close();
            ?>
        </table>
    </center>
    <footer>
        <center><p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p></center>
    </footer>
</body>
</html>
