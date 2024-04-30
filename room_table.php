<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            padding: 25px;
            color: white;
            background-color: blue;
        }
    </style> 
</head>
<body>
    <div class="container">
        <h2 class="text-center font-weight-bold" style="font-family: 'Century', sans-serif;">HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h4 class="text-center font-weight-bold" style="font-family: 'Century', sans-serif;">LIST OF ROOMS IN OUR SYSTEM</h4>
        <a href="room.php" class="btn btn-primary" style="margin-top: 20px;">New Room</a>
        <a href="home.php" class="btn btn-secondary float-right">Back Home</a>
        <br /><br />
        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>Room Type</th>
                    <th>Price per Night</th>
                    <th>Description</th>
                    <th>Customer ID</th>
                    <th>Room ID</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "dbconnection.php"; // Connection details

                $sql = "SELECT * FROM room";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['Roomtype']) . "</td>
                            <td>" . htmlspecialchars($row['Pricepernight']) . "</td>
                            <td>" . htmlspecialchars($row['Description']) . "</td>
                            <td>" . htmlspecialchars($row['customer_id']) . "</td>
                            <td>" . htmlspecialchars($row['room_id']) . "</td>
                            <td><a class='btn btn-danger' href='deleteroom.php?room_id=" . urlencode($row['room_id']) . "'>Delete</a></td>
                            <td><a class='btn btn-info' href='update_room.php?room_id=" . urlencode($row['room_id']) . "'>Edit</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found</td></tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>
