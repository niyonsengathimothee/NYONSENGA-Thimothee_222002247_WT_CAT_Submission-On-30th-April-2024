<?php
if (isset($_GET["reservation_id"])) {
   $reservation_id=$_GET["reservation_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM reservation WHERE reservation_id=$reservation_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:reservation_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>