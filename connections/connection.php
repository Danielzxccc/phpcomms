<?php

    function connection(){

        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $database = "student";

        $con = new mysqli($servername, $username, $password, $database);
        if($con->connect_error){
            echo $con->connect_error;
        }
        else{
            return $con;
        }
    }