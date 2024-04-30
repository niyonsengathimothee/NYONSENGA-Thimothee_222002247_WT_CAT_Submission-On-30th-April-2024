<?php 
include "dbconnection.php";

$payment_id = $payment_method = $payment_amount = $payment_status = $payment_date = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["payment_id"])) {
    $payment_id = $_GET["payment_id"];

    // Prepared statement to avoid SQL injection
    $stmt = $connection->prepare("SELECT * FROM payment WHERE payment_id = ?");
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $payment_id = $row["payment_id"];
        $payment_method = $row["paymentmethod"];
        $payment_amount = $row["paymentamount"];
        $payment_status = $row["paymentstatus"];
        $payment_date = $row["paymentdate"];
    } else {
        header("Location: /wet/payment_table.php");
        exit;
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $payment_id = $_POST["payment_id"];
    $payment_method = $_POST["paymentmethod"];
    $payment_amount = $_POST["paymentamount"];
    $payment_status = $_POST["paymentstatus"];
    $payment_date = $_POST["paymentdate"];

    if (empty($payment_id) || empty($payment_method) || empty($payment_amount) || empty($payment_status) || empty($payment_date)) {
        echo "All fields are required!";
    } else {
        $stmt = $connection->prepare("UPDATE payment SET paymentmethod = ?, paymentamount = ?, paymentstatus = ? WHERE payment_id = ?");
        $stmt->bind_param("sssi", $payment_method, $payment_amount, $payment_status, $payment_id);
        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("Location: /wet/payment_table.php");
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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Reservation Management System</title>
    <style>
        h2, h3 {
            font-family: Castellar;
            color: darkblue;
        }
        label, input, .sb {
            font-family: Arial, sans-serif;
        }
        label {
            font-size: 16px;
            color: darkblue;
        }
        .sb {
            padding: 10px;
            border: 2px solid blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
            cursor: pointer;
        }
        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border: 2px solid green;
        }
    </style>
</head>
<body>
    <center>
        <h2>Hostel Reservation Management System</h2>
        <h3>Update Payment Information Here</h3>
        <form method="POST">
            <label>Payment ID</label><br>
            <input type="text" name="payment_id" class="input" value="<?php echo htmlspecialchars($payment_id); ?>" readonly><br>
            <label>Payment Method</label><br>
            <input type="text" name="paymentmethod" class="input" value="<?php echo htmlspecialchars($payment_method); ?>"><br>
            <label>Payment Amount</label><br>
            <input type="number" name="paymentamount" class="input" value="<?php echo htmlspecialchars($payment_amount); ?>"><br>
            <label>Payment Status</label><br>
            <input type="text" name="paymentstatus" class="input" value="<?php echo htmlspecialchars($payment_status); ?>"><br>
            <label>Payment Date</label><br>
            <input type="date" name="paymentdate" class="input" value="<?php echo htmlspecialchars($payment_date); ?>"><br>
            <input type="submit" name="submit" value="Update" class="sb">
        </form>
    </center>
    <footer>
        <p>&copy; 2024 UR CBE BIT Year 2 @ Group A</p>
    </footer>
</body>
</html>
