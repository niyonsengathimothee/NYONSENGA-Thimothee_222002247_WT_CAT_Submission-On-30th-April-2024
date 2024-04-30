<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hostel reservation management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<center>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">HOSTEL RESERVATION MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL CUSTOMER IN THIS SYSTEM </h4>
        <a href="customer.html" class="btn btn-primary" style="margin-top: 0px;">New Product</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table border="2">
            <thead>
                <tr>
                    <th>customer_id</th>
                    <th>fname</th>
                    <th>lname</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "dbconnection.php";
                $sql = "SELECT * FROM customer";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['fname']}</td> 
                        <td>{$row['lname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telephone']}</td>
                        <td>
                            <a href='/wet/update_customer.php?customer_id={$row['customer_id']}' class='btn btn-primary btn-sm'>Update</a></td>
                            <td>
                            <a href='/wetT/delete_customer.php?customer_id={$row['customer_id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    </center>
</body>
</html>