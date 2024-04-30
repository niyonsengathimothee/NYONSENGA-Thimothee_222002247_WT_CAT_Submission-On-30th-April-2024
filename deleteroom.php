<?php
if (isset($_GET["room_id"])) {
   $room_id=$_GET["room_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM room WHERE room_id=$room_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:room_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>