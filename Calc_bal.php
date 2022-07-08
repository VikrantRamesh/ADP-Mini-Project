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

function calc_dist_exp()
{
    include('connection.php');
    $user_id = $_SESSION['user_id'];
    $table_name = 'budget_' . $user_id;

    $exp_arr = [$food, $health, $transport, $clothes, $taxes, $entertainment, $sports, $eating, $toiletry];
    $inc_arr = [$salary, $bonus, $gift, $others];

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Food'";
    $res = mysqli_query($con, $q1);
    $food = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $food = $food + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Health'";
    $res = mysqli_query($con, $q1);
    $health = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $health = $health + (int)($row['amount']);
    }


    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Transport'";
    $res = mysqli_query($con, $q1);
    $transport = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $transport = $transport + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Clothes'";
    $res = mysqli_query($con, $q1);
    $clothes = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $clothes = $clothes + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Taxes'";
    $res = mysqli_query($con, $q1);
    $taxes = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $taxes = $taxes + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Entertainment'";
    $res = mysqli_query($con, $q1);
    $entertainment = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $entertainment = $entertainment + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Sports'";
    $res = mysqli_query($con, $q1);
    $sports = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $sports = $sports + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Eating'";
    $res = mysqli_query($con, $q1);
    $eating = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $eating = $eating + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Toiletry'";
    $res = mysqli_query($con, $q1);
    $toiletry = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $toiletry = $toiletry + (int)($row['amount']);
    }

    return $exp_arr;
}

function calc_dist_inc()
{
    include('connection.php');
    $user_id = $_SESSION['user_id'];
    $table_name = 'budget_' . $user_id;

    $inc_arr = [$salary, $bonus, $gift, $others];

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Salary'";
    $res = mysqli_query($con, $q1);
    $salary = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $salary = $salary + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Bonus'";
    $res = mysqli_query($con, $q1);
    $health = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $bonus = $bonus + (int)($row['amount']);
    }


    $q1 = "SELECT amount FROM $table_name WHERE mode = 'Gift'";
    $res = mysqli_query($con, $q1);
    $transport = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $gift = $gift + (int)($row['amount']);
    }

    $q1 = "SELECT amount FROM $table_name WHERE mode = 'others'";
    $res = mysqli_query($con, $q1);
    $clothes = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $others = $others + (int)($row['amount']);
    }

    return $inc_arr;
}

function calc_inc()
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

    return $income;
}

function calc_exp()
{
    include('connection.php');
    $user_id = $_SESSION['user_id'];
    $table_name = 'budget_' . $user_id;



    $q2 = "SELECT amount FROM $table_name WHERE type = 'Expense'";
    $res = mysqli_query($con, $q2);

    $expense = 0;

    while ($row = mysqli_fetch_assoc($res)) {
        $expense = $expense + (int)($row['amount']);
    }

    return $expense;
}