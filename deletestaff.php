<?php
if (isset($_GET["staff_id"])) {
   $staff_id=$_GET["staff_id"];
   //call file that contain database connection
include "dbconnection.php";
$sql="DELETE FROM staff WHERE staff_id=$staff_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:staff_table.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>