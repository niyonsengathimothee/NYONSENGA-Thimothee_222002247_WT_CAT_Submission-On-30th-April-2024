<?php
include "dbconnection.php";

$staff_id = $fname = $lname = $email = $telephone = $payment_id = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["staff_id"])) {
    $staff_id = $_GET["staff_id"];
    $stmt = $connection->prepare("SELECT * FROM staff WHERE staff_id = ?");
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $staff_id = $row["staff_id"];
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email = $row["email"];
        $telephone = $row["telephone"];
        $payment_id = $row["payment_id"];
    } else {
        header("Location: /wet/staff_table.php");
        exit;
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $staff_id = $_POST["staff_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $payment_id = $_POST["payment_id"];

    if (empty($staff_id) || empty($fname) || empty($lname) || empty($email) || empty($telephone) || empty($payment_id)){
        echo "All fields are required!";
    } else {
        $stmt = $connection->prepare("UPDATE staff SET fname=?, lname=?, email=?, telephone=?, payment_id=? WHERE staff_id=?");
        $stmt->bind_param("ssssii", $fname, $lname, $email, $telephone, $payment_id, $staff_id);
        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("Location: /wet/staff_table.php");
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
        <h3 style="color: green;">UPDATE USER HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>Staff ID</label><br>
                <input type="text" name="staff_id" class="input" value="<?php echo htmlspecialchars($staff_id); ?>"><br>
                <label>First Name</label><br>
                <input type="text" name="fname" class="input" value="<?php echo htmlspecialchars($fname); ?>"><br> 
                <label>Last Name</label><br>
                <input type="text" name="lname" class="input" value="<?php echo htmlspecialchars($lname); ?>"><br>
                <label>Email</label><br>
                <input type="text" name="email"  class="input" value="<?php echo htmlspecialchars($email); ?>"><br>
                <label>Telephone</label><br>
                <input type="text" name="telephone"  class="input" value="<?php echo htmlspecialchars($telephone); ?>"><br>
                <label>Payment ID</label><br>
                <input type="text" name="payment_id"  class="input" value="<?php echo htmlspecialchars($payment_id); ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT Year 2 @ Group A</p>
    </footer>
</body>
</html>
