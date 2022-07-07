<?php

function calc_balance()
{

    include('connection.php');
    $user_id = $_SESSION['user_id'];
    $table_name = 'budget_' . $user_id;



    $q1 = "SELECT amount FROM $table_name WHERE type = 'Income'";
    $res = mysqli_query($con, $q1);

    $income = 0;

    while ($row = mysqli_fetch_assoc($res)) {
        $income = $income + (int)($row['amount']);
    }



    $q2 = "SELECT amount FROM $table_name WHERE type = 'Expense'";
    $res = mysqli_query($con, $q2);

    $expense = 0;

    while ($row = mysqli_fetch_assoc($res)) {
        $expense = $expense + (int)($row['amount']);
    }

    $balance = $income - $expense;

    return $balance;
}