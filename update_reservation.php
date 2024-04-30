<?php 
include "dbconnection.php";

$reservation_id = $customer_id = $checkin_date = $checkout_date = $booking_date = $total_price = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["reservation_id"])) {
    $reservation_id = $_GET["reservation_id"];

    $stmt = $connection->prepare("SELECT * FROM reservation WHERE reservation_id = ?");
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $reservation_id = $row["reservation_id"];
        $customer_id = $row["customer_id"];
        $checkin_date = $row["checkin_date"];
        $checkout_date = $row["checkout_date"];
        $booking_date = $row["booking_date"];
        $total_price = $row["total_price"];
    } else {
        header("Location: /wet/reservation_table.php");
        exit;
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $reservation_id = $_POST["reservation_id"];
    $customer_id = $_POST["customer_id"];
    $checkin_date = $_POST["checkin_date"];
    $checkout_date = $_POST["checkout_date"];
    $booking_date = $_POST["booking_date"];
    $total_price = $_POST["total_price"];

    if (empty($reservation_id) || empty($customer_id) || empty($checkin_date) || empty($checkout_date) || empty($booking_date) || empty($total_price)) {
        echo "All fields are required!";
    } else {
        $stmt = $connection->prepare("UPDATE reservation SET customer_id=?, checkin_date=?, checkout_date=?, booking_date=?, total_price=? WHERE reservation_id=?");
        $stmt->bind_param("issssi", $customer_id, $checkin_date, $checkout_date, $booking_date, $total_price, $reservation_id);
        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("Location: /wet/reservation_table.php");
            exit;
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Reservation Management System</title>
    <script>
        function confirmUpdate() {
            return confirm('Do you want to update this record?');
        }
    </script>
    <style>
        h2 {
            font-family: 'Castellar';
            color: darkblue;
        }
        label {
            font-family: 'Elephant';
            font-size: 20px;
        }
        .sb {
            font-family: 'Georgia';
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }
        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    </style>
</head>
<body>
    <center>
        <h2>HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h3 style="color: green;">UPDATE RESERVATION HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>Reservation ID</label><br>
                <input type="text" name="reservation_id" class="input" value="<?php echo htmlspecialchars($reservation_id); ?>"><br>
                <label>Customer ID</label><br>
                <input type="text" name="customer_id" class="input" value="<?php echo htmlspecialchars($customer_id); ?>"><br>
                <label>Check-in Date</label><br>
                <input type="date" name="checkin_date" class="input" value="<?php echo htmlspecialchars($checkin_date); ?>"><br>
                <label>Check-out Date</label><br>
                <input type="date" name="checkout_date" class="input" value="<?php echo htmlspecialchars($checkout_date); ?>"><br>
                <label>Booking Date</label><br>
                <input type="date" name="booking_date" class="input" value="<?php echo htmlspecialchars($booking_date); ?>"><br>
                <label>Total Price</label><br>
                <input type="text" name="total_price" class="input" value="<?php echo htmlspecialchars($total_price); ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT Year 2 @ Group A</p>
    </footer>
</body>
</html>
