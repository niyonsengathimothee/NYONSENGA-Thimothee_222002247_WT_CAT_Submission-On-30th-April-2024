<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSTEL RESERVATION MANAGEMENT SYSTEM</title>
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
        <h2 style="text-align: center; font-family: century; font-weight: bold;">HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF STAFF IN OUR SYSTEM</h4>
        <a href="customer_form.php" class="btn btn-primary">New Staff</a>
        <a href="home.php" class="btn btn-secondary" style="float: right;">Back Home</a>
        <br><br>

        <?php
        include "dbconnection.php"; // Include database connection settings

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['staff_id'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['telephone'], $_POST['payment_id'])) {
            $stmt = $connection->prepare("INSERT INTO staff (staff_id, fname, lname, email, telephone, payment_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssii", $_POST['staff_id'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['telephone'], $_POST['payment_id']);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>New record has been added successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }

        $sql = "SELECT * FROM staff";
        $result = $connection->query($sql);
        ?>

        <table class="table table-bordered">
            <thead class="bg-warning">
                <tr>
                    <th>staff_id</th>
                    <th>fname</th>
                    <th>lname</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th>payment_id</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['staff_id']) . "</td>
                            <td>" . htmlspecialchars($row['fname']) . "</td>
                            <td>" . htmlspecialchars($row['lname']) . "</td>
                            <td>" . htmlspecialchars($row['email']) . "</td>
                            <td>" . htmlspecialchars($row['telephone']) . "</td>
                            <td>" . htmlspecialchars($row['payment_id']) . "</td>
                          <td><a style='padding:4px' href='deletestaff.php?staff_id={$row['staff_id']}'>Delete</a></td>
                <td><a style='padding:4px' href='update_staff.php?staff_id={$row['staff_id']}'>edit</a></td> 
                </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data found</td></tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
    
    <footer>
        &copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A
    </footer>
</body>
</html>
