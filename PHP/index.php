<?php
  session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

  $_SESSION;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Budget Bee</title>

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;900&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mountains+of+Christmas:wght@400;700&display=swap" rel="stylesheet">


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

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TogglerId" aria-controls="TogglerId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id ="TogglerId">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Budget.html">Budget</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="goals.html">Goals</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signin.html">Sign In</a>
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




    <div class="container-fluid-2 background-clr">

        <div class="row">

          <div class="col-lg-6 col-md-12">
            <img src="Images\credit-card.png" alt="statistics" class="Statistics-img Statistics">
          </div>

          <div class="col-lg-6 col-md-12">
            <h2 class="Statistics secondary-headings">Experience a World Class Budget management like never befores.</h2>
          </div>

        </div>

    </div>
  </section>

  <div class="container-fluid-2 center-align">

      <div class="row">


          <h2 class="Try-Budget secondary-headings">try out the browser version of our project!</h2>
      </div>

          <button type="button" class="btn btn-lg btn-block btn-outline-dark custom-signin">Manage Budget</button>
          <button type="button" class="btn btn-lg btn-block btn-outline-dark custom-signin">Set Goals</button>
      </div>


      </div>

  </div>
    </section>





    <footer id="footer">

      <p>© Copyright Budget Bee</p>

    </footer>
  </body>
</html>

