<?php
$expense = $_POST["Expence-amt"];
if (isset($_POST["Expence-amt"])) {

    echo ($_POST["Expence-amt"]);
    if (isset($expense)) {
        echo "<h1>Total Expense : $expense</h1>";
    }
}