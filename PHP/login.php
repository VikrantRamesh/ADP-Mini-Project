<?php
session_start();
include('connection.php');
include("functions.php");

if (!check_login($con)) {
  echo "<span style='color:#8B0000;'>LOGIN/SIGNUP to use our premium features.<br>";
}

$_SESSION["logged"] = false;

if ($_SESSION["signed"] == true) {
  echo ("Account sucessfully Created!");
}

if ($_POST) {
  //something was posted

  $user_name = $_POST['user_name'];

  $pass = $_POST['password'];

  //read from database
  $query = "select * from users where user_name = '$user_name' limit 1";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {

    $user_data = mysqli_fetch_assoc($result);

    if ($user_data['password'] === $pass) {
      $_SESSION["logged"] = true;
      $_SESSION['user_id'] = $user_data['user_id'];
      header("Location: dashboard.php");
    }
  }

  echo "wrong username/Password!";
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

    <!--font-awesome-->
    <script src="https://kit.fontawesome.com/dae2797b42.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="CSS\Common.css">
    <link rel="stylesheet" href="CSS\signin.css">

</head>


<body>


    <!--<section id="common-bg-color">-->
    <section id="NavBar">
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
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Budget.php">Budget</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Log In</a>
                    </li>

                </ul>
            </div>
        </nav>
    </section>



    <section id="login-form">
        <div class="login-form-container">

            <div class="row row-no-margin">

                <div class="col-lg-5 sign-in-image">

                </div>

                <div class="col-lg-7 login-form-main">

                    <h2>LOGIN</h2>

                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-12 form-row">
                                <input type="text" id="user_name" name="user_name" class="label"
                                    placeholder="Username"><br>

                            </div>

                            <p class="err-msg"></p>

                            <div class="col-lg-12 form-row">

                                <input type="password" id="password" name="password" class="label"
                                    placeholder="password">
                                <a id="show-pass" onclick="show_pass()"><span class="show-pass-icon"><i
                                            class="fa-solid fa-eye primary"></i></span></a>

                            </div>

                            <p class="err-msg"></p>

                            <div class="col-lg-12 form-row">

                                <input type="submit" value="Submit" class="submit">

                            </div>

                            <div class="col-lg-12 form-row">

                                <h3>New Member? <a href="./signin.php">Sign In</a></h3>

                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>




    <script src="JS\login.js">
    </script>
</body>

</html>