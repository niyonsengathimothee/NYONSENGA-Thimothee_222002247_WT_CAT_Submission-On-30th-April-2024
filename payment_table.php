<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Reservation Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        footer {
            height: 50px;
            text-align: center;
            padding: 20px;
            color: white;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center; font-family: 'Century Gothic', sans-serif; font-weight: bold;">Hostel Reservation Management System</h2>
        <h4 style="text-align: center; font-family: 'Century Gothic', sans-serif; font-weight: bold;">List of Payments in Our System</h4>
        <a href="home.php" class="btn btn-secondary" style="float: right;">Back Home</a>

        <?php
        include "dbconnection.php"; // Database connection

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stmt = $connection->prepare("INSERT INTO payment (payment_id, paymentmethod, paymentamount, paymentstatus, paymentdate) VALUES (?, ?, ?, ?, ?)");
            if (!$stmt) {
                die('MySQL prepare error: ' . $connection->error);
            }

            $payment_id = (int) $_POST['payment_id'];
            $paymentmethod = $connection->real_escape_string($_POST['paymentmethod']);
            $paymentamount = (float) $_POST['paymentamount'];
            $paymentstatus = $connection->real_escape_string($_POST['paymentstatus']);
            $paymentdate = $connection->real_escape_string($_POST['paymentdate']);
            $stmt->bind_param("issis", $payment_id, $paymentmethod, $paymentamount, $paymentstatus, $paymentdate);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>New record has been added successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }

        $sql = "SELECT * FROM payment";
        $result = $connection->query($sql);
        if (!$result) {
            die('Error executing the query: ' . $connection->error);
        }
        ?>

        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Payment ID</th>
                    <th>Payment Method</th>
                    <th>Payment Amount</th>
                    <th>Payment Status</th>
                    <th>Payment Date</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['payment_id']) . "</td>
                            <td>" . htmlspecialchars($row['paymentmethod']) . "</td>
                            <td>" . htmlspecialchars($row['paymentamount']) . "</td>
                            <td>" . htmlspecialchars($row['paymentstatus']) . "</td>
                            <td>" . htmlspecialchars($row['paymentdate']) . "</td>
                            <td><a class='btn btn-danger' href='deletepayment.php?payment_id=" . urlencode($row['payment_id']) . "'>Delete</a></td>
                            <td><a class='btn btn-success' href='update_payment.php?payment_id=" . urlencode($row['payment_id']) . "'>Edit</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php $connection->close(); ?>
    </div>
    <footer>
        <p>&copy; 2024 UR CBE BIT Year 2 @ Group A</p>
    </footer>
</body>
</html>
