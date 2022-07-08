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
    <link rel="stylesheet" href="CSS\card.css">
    <link rel="stylsheet" href="CSS\seestat.css">



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
    <centre>
        <h2></h2>
        <p></p>

        <div class="row">
            <div class="column">
                <div class="card">

                    <img src="./Images/bg2.png" alt="money">
                    <h1>BUDGETING</h1>
                    <p>calculate your daily expenses</p>
                    <a href="budgeting.php">
                        <button type="button" id="budget" class="btns"
                            onclick="location.href = 'budgeting.php'">calculate</button>
                    </a>
                </div>
            </div>

            <div class="column">
                <div class="card">

                    <img src="./Images/bg3.png" alt="money">
                    <h1>SEE STATS</h1>
                    <p>keep track of your expenses</p>
                    <a href="seestat.html">
                        <button type="button" id="stat" class="btns">see </button>
                    </a>
                </div>
            </div>
    </centre>
</body>

</html>