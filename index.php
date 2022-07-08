<?php
session_start();
include("connection.php");
include("functions.php");


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Budget Bee</title>

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Montserrat:wght@100&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas:wght@400;700&display=swap"
        rel="stylesheet">


    <!--font-awesome-->
    <script src="https://kit.fontawesome.com/dae2797b42.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="CSS\Common.css">
    <link rel="stylesheet" href="CSS\Master.css">
    <link rel="stylesheet" href="CSS\Colors.css">

</head>

<body>

    <section id="Title">

        <nav class="navbar navbar-expand-lg navbar-dark">

            <h1 class="navbar-brand navbar-light title-color">Budget Bee</h1>
            <div class="bee-img-div">
                <a>
                    <img src="./Images/iconbee.png" alt="" class="bee-img">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TogglerId"
                aria-controls="TogglerId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="TogglerId">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Budget.php">Budget</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!check_login($con)) {
                            echo "<a class='nav-link' href='signin.php'>Sign In</a>";
                        } else {
                            echo "<a class='nav-link' href='dashboard.php'>Dashboard</a>";
                        }
                        ?>
                    </li>

                </ul>

            </div>
        </nav>



        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-6 col-md-12">
                    <h2 class="Main-Welcome-heading">The future you earn. The service you deserve.</h2>
                </div>

                <div class="col-lg-6 col-md-12">
                    <img src="Images\Main_page_Welcome_sub_img.png" alt="statistics" class="welcome-img">
                </div>

            </div>

        </div>
    </section>
    <!--general introduction-->

    <div class="app-into">
        <p id="welcome"> Budget Bee weclomes you!</p>
        <hr align="center" class="line">
        <p class="con">Track your expenses and save money wisely. Your small savings will help you to build your future
        </p>
        <p class="con">“Beware of little expenses a small leak will sink a great ship.” – Benjamin Franklin</p>
        <br>
        <a href="#explain"><input type="button" value="learn more" class="btn-1"></a>
        <br><br><br>
    </div>
    <section id="explain">

        <img src="./Images/bu.png" alt="explaination" style="width:50% ;">
    </section>
    <section id="features">

        <div class="row">

            <div class="col-lg-4 feature-containers mainpage-gold">
                <i class="fa-solid fa-circle-check fa-8x feature-img"></i>
                <h3 class="features-text">Easy to use.</h3>
                <h4>So easy to use, that you can use it with your eyes closed.</h4>
            </div>

            <div class="col-lg-4 feature-containers mainpage-gold">
                <i class="fa-solid fa-bullseye fa-8x feature-img"></i>
                <h3 class="features-text">Elite Clientele</h3>
                <h4>We deal with small savings to huge business finances</h4>
            </div>

            <div class="col-lg-4  feature-containers mainpage-gold">
                <i class="fa-solid fa-heart fa-8x feature-img"></i>
                <h3 class="features-text">Trust</h3>
                <h4>Find your Pocket-friendly solution in our guidance.</h4>
            </div>

        </div>
    </section>

    <footer id="footer">

        <p>© Copyright Budget Bee</p>

    </footer>
</body>

</html>