<?php

include_once("connections/connection.php");    
$con = connection();

if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $studentid = $_POST['studentid'];
    $sql = "DELETE FROM enrollment WHERE enrollmentid = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: detailsenrollment.php?ID=".$studentid);
}