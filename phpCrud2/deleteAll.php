<?php
include "conn.php";

if(isset($_POST['deleteall'])){
    $checkbox =$_POST['check'];

    for($i=0;$i<count($checkbox);$i++){
        $del_id =$checkbox[$i];

        $sql ="DELETE FROM client WHERE ID ='".$del_id."'";
        if($conn->query($sql)){
            $_SESSION['success'] ="Deleted Successfully";
        }else{
            $_SESSION['error'] = $conn->error;
        }

    }
}
header('location:home.php');
?>