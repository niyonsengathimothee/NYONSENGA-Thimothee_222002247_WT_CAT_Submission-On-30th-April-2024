<?php
if (isset($_GET["customer_id"])) {
   $customer_id=$_GET["customer_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM customer WHERE customer_id=$customer_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:customer_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>