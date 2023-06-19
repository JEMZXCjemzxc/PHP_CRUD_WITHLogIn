<?php

include "conn.php";
$id = $_GET['delete'];

// use WHERE to delete specific data from database
$sql = "DELETE FROM client WHERE ID ='$id'";

if($conn->query($sql)){
    $_SESSION['success']="Record Successfully Delete";
}
else { 
    $_SESSION['error']="Record Not Deleted Try Again";
}
header("location:home.php"); // go back to index page after deleting
?>