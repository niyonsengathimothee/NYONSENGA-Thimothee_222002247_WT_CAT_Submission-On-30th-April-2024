<?php 
include "dbconnection.php"; // Include the database connection file

$Roomtype = $Pricepernight = $Description = $customer_id = $room_id = "";

// Check if the request is GET and the room_id is set
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["room_id"])) {
    $room_id = $_GET["room_id"];

    // Prepare and execute a statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT Roomtype, Pricepernight, Description, customer_id FROM room WHERE room_id = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Roomtype = $row["Roomtype"];
        $Pricepernight = $row["Pricepernight"];
        $Description = $row["Description"];
        $customer_id = $row["customer_id"];
    } else {
        header("location: /wet/room_table.php");
        exit;
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"], $_POST["room_id"], $_POST["Roomtype"], $_POST["Pricepernight"], $_POST["Description"], $_POST["customer_id"])) {
    $room_id = $_POST["room_id"];
    $Roomtype = $_POST["Roomtype"];
    $Pricepernight = $_POST["Pricepernight"];
    $Description = $_POST["Description"];
    $customer_id = $_POST["customer_id"];

    if (empty($Roomtype) || empty($Pricepernight) || empty($Description) || empty($customer_id) || empty($room_id)) {
        echo "All fields are required!";
    } else {
        $stmt = $connection->prepare("UPDATE room SET Roomtype=?, Pricepernight=?, Description=?, customer_id=? WHERE room_id=?");
        $stmt->bind_param("ssssi", $Roomtype, $Pricepernight, $Description, $customer_id, $room_id);
        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("Location: /wet/room_table.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
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
        h2 {
            font-family: Castellar;
            color: darkblue;
        }
        label {
            font-family: Elephant;
            font-size: 20px;
        }
        .sb {
            font-family: Georgia;
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
        <h3 style="color:green;">UPDATE ROOM INFORMATION HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>Roomtype</label><br>
                <input type="text" name="Roomtype" class="input" value="<?php echo htmlspecialchars($Roomtype); ?>"><br>
                <label>Price per night</label><br>
                <input type="text" name="Pricepernight" class="input" value="<?php echo htmlspecialchars($Pricepernight); ?>"><br> 
                <label>Description</label><br>
                <input type="text" name="Description" class="input" value="<?php echo htmlspecialchars($Description); ?>"><br>
                <label>Customer ID</label><br>
                <input type="text" name="customer_id" readonly class="input" value="<?php echo htmlspecialchars($customer_id); ?>"><br>
                <label>Room ID</label><br>
                <input type="text" name="room_id" readonly class="input" value="<?php echo htmlspecialchars($room_id); ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>
