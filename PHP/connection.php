<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "budget_bee";

    $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if($con)
    {
        echo "Connected Successfully";
    }
        else{
        die("Connection failed");
    }
?>