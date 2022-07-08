<?php

session_start();

$user_id = $_SESSION['user_id'];
$table_name = 'budget_' . $user_id;

$date = date("Y.m.d");
include('connection.php');



if (isset($_POST["Income"])) {
    $income = $_POST["Income"];
    $mode = $_POST["Income-mode"];
    $time = date("H:i:s", time());

    $query = "INSERT INTO $table_name(type,mode,amount,date,time) values ('Income','$mode','$income','$date','$time')";

    $res = mysqli_query($con, $query);

    header('location: Budget.php');
}