<?php

include_once("connections/connection.php");    
$con = connection();

if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM subject WHERE subjectid = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: subjectlist.php");
}