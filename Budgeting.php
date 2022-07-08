<?php
session_start();

include('connection.php');
include("functions.php");

if (!check_login($con)) {

    header("location: login.php");
}
$user_id = $_SESSION['user_id'];

$table_name = 'budget_' . $user_id;
$table_name2 = 'dist_' . $user_id;

if ($res = mysqli_query($con, "SHOW TABLES LIKE '$table_name'")) {

    if (mysqli_num_rows($res) == 0) {

        $query = "CREATE TABLE $table_name(
                type VARCHAR(100),
                mode VARCHAR(100),
                amount INT(100),
                date VARCHAR(10),
                time VARCHAR(10)
            )";

        $res = mysqli_query($con, $query);
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <title>Budget Bee</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

    <!--font-awesome-->
    <script src="https://kit.fontawesome.com/dae2797b42.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS\Common.css">
    <link rel="stylesheet" href="CSS\Budget.css">
    <link rel="stylesheet" href="CSS\Colors.css">


    <!-- FAVICON -->
    <link rel="shortcut icon" href="Images\favicon.ico">


</head>


<body>

    <section id="NavBar">

        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <h1 class="navbar-brand navbar-light title-color">Budget Bee</h1>

            <div class="bee-img-div">

                <img src="./Images/iconbee.png" alt="" class="bee-img">
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TogglerId"
                aria-controls="TogglerId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="TogglerId">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Budget.php">Budget</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>

                </ul>
            </div>
        </nav>
    </section>

    <section id="Budget-core">

        <!-- start of container fluid -->

        <div class="container-fluid budget-core-content Lalezar-font">

            <div class="row main-row">

                <div class="col-lg-8">

                    <!-- start of MyGroup -->

                    <div id="myGroup">

                        <div class="row ubuntu-font">
                            <div class="col-lg-6 col-md-12">
                                <button type="button" name="Income-button" class="Budget-Buttons-income"
                                    data-bs-toggle="collapse" data-parent="#myGroup" data-bs-target="#Income-collapse"
                                    aria-expanded="false" aria-controls="Income-collapse">
                                    <h3>INCOME</h3>
                                </button>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <button type="button" name="Expence-button" class="Budget-Buttons-expence"
                                    data-bs-toggle="collapse" data-parent="#myGroup" data-bs-target="#Expence-collapse"
                                    aria-expanded="false" aria-controls="Expence-collapse">
                                    <h3>EXPENSE</h3>
                                </button>
                            </div>
                        </div>



                        <!-- income tab -->
                        <div class="collapse" id="Income-collapse" data-bs-parent="#myGroup">
                            <form name="income-form" id="income-form">
                                <h2>INCOME</h2>



                                <!-- Enter income amount text -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h3>Enter your Income amount:</h3>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <input type="text" name="Income-amt" placeholder="Income Amount"
                                            class="input-income-text" required>
                                    </div>
                                </div>
                                <!-- end of row 1 -->



                                <!-- mode of income -->
                                <div class="row">


                                    <div class="col-lg-6 col-md-12">
                                        <h3>Select the Mode of Income:</h3>
                                    </div>


                                    <div class="col-lg-6 col-md-12">

                                        <div class="row">

                                            <div class="col-lg-6 col-md-12 collapse-font rad">


                                                <input type="radio" name="Income-mode" class="radio isHidden"
                                                    id="Income-mode-salary" value="Salary">
                                                <label class="checkbox-des" for="Income-mode-salary">
                                                    <h4 class="radio-label">Salary</h4>
                                                </label>


                                            </div>

                                            <div class="col-lg-6 col-md-12 collapse-font rad">


                                                <input type="radio" name="Income-mode" class="radio isHidden"
                                                    id="Income-mode-bonus" value="Bonus">
                                                <label class="checkbox-des" for="Income-mode-bonus">
                                                    <h4 class="radio-label">Bonus</h4>
                                                </label>


                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6 col-md-12 collapse-font rad">


                                                <input type="radio" name="Income-mode" class="radio isHidden"
                                                    id="Income-mode-gift" value="Gift">
                                                <label class="checkbox-des" for="Income-mode-gift">
                                                    <h4 class="radio-label">Gift</h4>
                                                </label>


                                            </div>

                                            <div class="col-lg-6 col-md-12 collapse-font rad">


                                                <input type="radio" name="Income-mode" class="radio isHidden"
                                                    id="Income-mode-others" value="Others">
                                                <label class="checkbox-des" for="Income-mode-others">
                                                    <h4 class="radio-label">Others</h4>
                                                </label>

                                            </div>

                                        </div>

                                    </div>




                                </div>
                                <!-- end of row 2 -->



                                <!-- start of row 3 -->
                                <div class="row">

                                    <div class="col-lg-12">

                                        <button type="button" name="Publish-button" class="Budget-Buttons-publish"
                                            data-bs-toggle="collapse" data-parent="#myGroup"
                                            data-bs-target="#Income-collapse" aria-expanded="false"
                                            aria-controls="Income-collapse" id="Add_Income">
                                            <h3>Add Income</h3>
                                        </button>


                                    </div>


                                </div>
                                <!--end of row 3 -->

                            </form>

                        </div>



                        <!-- Expence tab -->
                        <div class="collapse" id="Expence-collapse" data-bs-parent="#myGroup">

                            <form name="expence-form" id="income-form">
                                <h2>EXPENSE</h2>

                                <!-- start of row 1 -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 collapse-font">
                                        <h3>Enter your Expense amount:</h3>
                                    </div>


                                    <div class="col-lg-6">
                                        <input type="text" name="Expence-amt" placeholder="Expence Amount"
                                            class="input-expence-text">
                                    </div>
                                </div>
                                <!--end of row 1 -->

                                <!-- start of row 2 -->
                                <div class="row">

                                    <h3>Select the Mode of Expense:</h3>

                                    <div class="row row-sm-margin">

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Food" value="Food">
                                            <label class="checkbox-des" for="Expence-mode-Food">
                                                <h4 class="radio-label">Food</h4>
                                            </label>


                                        </div>

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-health" value="Health">
                                            <label class="checkbox-des" for="Expence-mode-health">
                                                <h4 class="radio-label">health</h4>
                                            </label>


                                        </div>

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Trasport" value="Transport">
                                            <label class="checkbox-des" for="Expence-mode-Trasport">
                                                <h4 class="radio-label">Trasport</h4>
                                            </label>


                                        </div>

                                    </div>

                                    <div class="row row-sm-margin">

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Cloths" value="Clothes">
                                            <label class="checkbox-des" for="Expence-mode-Cloths">
                                                <h4 class="radio-label">Cloths</h4>
                                            </label>


                                        </div>

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-taxes" value="taxes">
                                            <label class="checkbox-des" for="Expence-mode-taxes">
                                                <h4 class="radio-label">taxes</h4>
                                            </label>

                                        </div>

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Entertainment" value="Entertainment">
                                            <label class="checkbox-des" for="Expence-mode-Entertainment">
                                                <h4 class="radio-label">Entertainment</h4>
                                            </label>


                                        </div>

                                    </div>

                                    <div class="row row-sm-margin">



                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Sports" value="Sports">
                                            <label class="checkbox-des" for="Expence-mode-Sports">
                                                <h4 class="radio-label">Sports</h4>
                                            </label>

                                        </div>

                                        <div class="col-lg-4">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Eating" value="Eating Out">
                                            <label class="checkbox-des" for="Expence-mode-Eating">
                                                <h4 class="radio-label">Eating Out</h4>
                                            </label>


                                        </div>

                                        <div class="col-lg-4 ">


                                            <input type="radio" name="Expence-mode" class="radio isHidden"
                                                id="Expence-mode-Toiletry" value="Toiletry">
                                            <label class="checkbox-des" for="Expence-mode-Toiletry">
                                                <h4 class="radio-label">Toiletry</h4>
                                            </label>

                                        </div>

                                    </div>


                                </div>
                                <!--end of row 2 -->

                                <!-- start of row 3 -->
                                <div class="row">

                                    <div class="col-lg-12">

                                        <button type="button" name="Publish-button" class="Budget-Buttons-publish"
                                            data-bs-toggle="collapse" data-parent="#myGroup"
                                            data-bs-target="#Expence-collapse" aria-expanded="false"
                                            aria-controls="Expence-collapse" id="Add_Expence">
                                            <h3>Add Expence</h3>
                                        </button>


                                    </div>


                                </div>
                                <!--end of row 3 -->
                            </form>
                        </div>


                    </div>

                    <!-- End of MyGroup -->



                    <div class="Core-Dist">
                        <p id="Err_Msg"></p>

                        <h2>Balance Budget: </h2>
                        <h1 id="Balance-Budget">₹0</h1>

                        <!-- row has the income-expense ratio and the history tab -->
                        <div class="row core-first-row common-box-border">
                            <div class="col-lg-6 col-md-12 inc-exp-ratio">

                                <h2>Income-Expense Ratio: </h2>
                                <!-- progress bar -->

                                <div class="progress">
                                    <div class="progress-bar progress-clr-green progress-bar-striped progress-bar-animated"
                                        role="progressbar" style="width: 0%" id="Income-bar"></div>
                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                                        role="progressbar" style="width: 0%" id="Expence-bar"></div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <h4><i class="fa-solid fa-circle fa-2xs inc-ratio-circle"></i> Income: <h4
                                                id="income_perc">0%</h4>
                                        </h4>
                                    </div>

                                    <div class="col-6">
                                        <h4><i class="fa-solid fa-circle fa-2xs exp-ratio-circle"></i> Expense: <h4
                                                id="expense_perc">0%</h4>
                                        </h4>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="History" id="history">


                                    <h2>HISTORY</h2>


                                    <div class="overflow-auto scroll">
                                        <Table id="hist-table">
                                            <tr>

                                                <th>Type</th>

                                                <th>Mode</th>

                                                <th>Amount</th>

                                                <th>Date</th>

                                                <th>Time</th>

                                            </tr>

                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="row">

                        <div class=" common-box-border-2">
                            <h6>Set Daily Expense Limit:</h6>
                            <select name="exp-limit" class="drop-down" onchange="exp_limit_select()" id="select_limit">
                                <option value="2000">2000</option>
                                <option value="5000">5000</option>
                                <option value="10000">10000</option>
                                <option value="20000">20000</option>
                            </select>
                            <h2>Custom input</h2>
                            <input type="text" name="exp-limit" class="normal-input-text" onchange="exp_limit_text()"
                                id="custom_limit">
                        </div>

                    </div>

                    <div class="row">
                        <div class="common-box-border-2 balance-ani" id="balance-ani">
                            <h3>Today's balance:</h3>
                            <h1 class="rem-balance-amt" id="rem-balance-amt">₹2000</h1>
                        </div>
                    </div>


                </div>

                <div class="row main-row">
                    <h2>Daily Expenditure:</h2>
                    <div class="progress progress-daily">
                        <div class="progress-bar progress-clr-yellow progress-bar-striped progress-bar-animated"
                            role="progressbar" style="width: 100%" id="Daily-exp-bar-rem"></div>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                            role="progressbar" style="width: 0%" id="Daily-exp-bar-spent"></div>
                    </div>

                </div>
            </div>




        </div>

        </div>
        <!-- end of main row -->

        </div>

        <!-- end of container-fluid -->

    </section>


    <div class="common-bg">
        <section class="sidestat">
            <!-- button for collapsing income-expense distribution -->
            <div>

                <a href="#Budget-core-2"><button type="button" name="Distribution-btn" class="distribution-show-btn"
                        data-bs-toggle="collapse" data-parent="#Distribution" data-bs-target="#Distribution"
                        aria-expanded="false" aria-controls="Distribution">
                        <h2>See Statistics </h2>
                    </button></a>
            </div>


            <section id="Budget-core-2">

                <div class="collapse" id="Distribution" data-bs-parent="#Distribution">


                    <!-- start of container fluid-2 -->

                    <div class="container-fluid budget-core-content-2 Lalezar-font">

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="Expense-main common-box-border">

                                    <!-- expense distribution -->

                                    <h2 id="expensebox">Expense Distribution: </h2>

                                    <!-- graph core -->
                                    <div class="row core-row-third">

                                        <div class="col-2 graph-base">

                                        </div>

                                        <div class="col core-graph">
                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-blue expense-core-bar" id="food-bar">
                                                    <h3 id="food_perc">0%</h3>
                                                </div>
                                            </div>
                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-pink expense-core-bar"
                                                    id="health-bar">
                                                    <h3 id="health_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-yellow expense-core-bar"
                                                    id="transport-bar">
                                                    <h3 id="transport_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-violet expense-core-bar"
                                                    id="clothes-bar">
                                                    <h3 id="clothes_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-gray expense-core-bar" id="taxes-bar">
                                                    <h3 id="taxes_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-hunter expense-core-bar"
                                                    id="entertainment-bar">
                                                    <h3 id="entertainment_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-brown expense-core-bar"
                                                    id="sports-bar">
                                                    <h3 id="sports_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-pur-pink expense-core-bar"
                                                    id="eating-bar">
                                                    <h3 id="eating_perc">0%</h3>
                                                </div>
                                            </div>

                                            <div class="row core-graph-row">

                                                <div class="col-md-1 progress-clr-saffron expense-core-bar"
                                                    id="toiletry-bar">
                                                    <h3 id="toiletry_perc">0%</h3>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row core-row-fifth common-box-border">

                                        <div class="row core-row-sixth">

                                            <div class="col-md-2" style="width: 20%">
                                                <h3 class="progress-clr-blue-bg expense-dist-label-border">Food</h3>
                                            </div>

                                            <div class="col-md-2" style="width: 20%">
                                                <h3 class="progress-clr-pink-bg expense-dist-label-border">Health</h3>
                                            </div>
                                            <div class="col-md-2" style="width: 20%">
                                                <h3 class="progress-clr-yellow-bg expense-dist-label-border">Trans</h3>
                                            </div>

                                            <div class="col-md-2" style="width: 20%">
                                                <h3 class="progress-clr-violet-bg expense-dist-label-border">Clothes
                                                </h3>
                                            </div>

                                            <div class="col-md-2" style="width: 20%">
                                                <h3 class="progress-clr-gray-bg expense-dist-label-border">taxes</h3>
                                            </div>

                                        </div>

                                        <div class="row core-row-sixth">

                                            <div class="col-md-3 ">
                                                <h3 class="progress-clr-hunter-bg expense-dist-label-border">Entertain
                                                </h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="progress-clr-brown-bg expense-dist-label-border">Sports</h3>
                                            </div>

                                            <div class="col-md-3">
                                                <h3 class="progress-clr-pur-pink-bg expense-dist-label-border">
                                                    Eating-out
                                                </h3>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="progress-clr-saffron-bg expense-dist-label-border">Toiletry
                                                </h3>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <!-- income distribution -->
                                <div class="row core-second-row common-box-border">
                                    <div class="col">
                                        <h2>Income Distribution: </h2>
                                        <div class="progress" id="income-distribution">
                                            <div class="progress-bar progress-clr-blue progress-bar-striped progress-bar-animated"
                                                role="progressbar" style="width: 0%" id="Salary-bar"></div>
                                            <div class="progress-bar progress-clr-yellow progress-bar-striped progress-bar-animated"
                                                role="progressbar" style="width: 0%" id="Bonus-bar"></div>
                                            <div class="progress-bar progress-clr-pink progress-bar-striped progress-bar-animated"
                                                role="progressbar" style="width: 0%" id="Gift-bar"></div>
                                            <div class="progress-bar progress-clr-violet progress-bar-striped progress-bar-animated"
                                                role="progressbar" style="width: 0%" id="Others-bar"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <h3><i class="fa-solid fa-circle progress-clr-blue fa-2xs"></i> Salary: <h2
                                                    id="salary_perc">0%</h2>
                                            </h3>
                                        </div>

                                        <div class="col-3">
                                            <h3><i class="fa-solid progress-clr-yellow fa-circle fa-2xs"></i> Bonus: <h2
                                                    id="bonus_perc">0%</h2>
                                            </h3>
                                        </div>
                                        <div class="col-3">
                                            <h3><i class="fa-solid fa-circle progress-clr-pink fa-2xs"></i> Gift: <h2
                                                    id="gift_perc">0%</h2>
                                            </h3>
                                        </div>

                                        <div class="col-3">
                                            <h3><i class="fa-solid progress-clr-violet fa-circle fa-2xs"></i> others:
                                                <h2 id="others_perc">0%</h2>
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" common-box-border-2">
                                        <h1>Maximum Expenditure:</h1>
                                        <h1 class="max-exp overflow-auto scroll-max-exp" id="max_exp_text"></h1>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- end of container fluid-2 -->


                </div>


            </section>



            <footer id="footer">

                <p>© Copyright Budget Bee</p>

            </footer>
        </section>
    </div>

    <script src="JS\Budget-js.js">
    </script>

</body>

</html>