<?php
  session_start();

    include("connection.php");
    include("functions.php");



    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //collect data from the post variable

        $user_name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

        //save to database after validation
        $user_name = random_num(20);
        $query = "INSERT INTO accounts (user_name, user_id, email, password) values ('$user_name', '$user_id', '$email', '$pass')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
      }else
    {
      echo "Please enter valid informattion";
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

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TogglerId" aria-controls="TogglerId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id ="TogglerId">

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Budget.html">Budget</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="goals.html">Goals</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="signin.php">Sign In</a>
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
                <h2>SIGN IN</h2>

                <form method = "post">
                    <div class="row">
                        <div class="col-lg-12 form-row">
                            <input type="text" id="name" name="fname"  class="label" placeholder="Username"><br>

                        </div>
                        <p class="err-msg"></p>


                        <div class="col-lg-12 form-row">

                            <input type="text" id="email" name="email"  class="label" placeholder="Email" onchange="fun_email()"><br>

                        </div>


                        <p id="err-email" class="err-msg"></p>

                        <div class="col-lg-12 form-row">

                            <input type="password" id="pass" name="pass"  class="pass-class" placeholder="Password" onchange="fun_pass()">
                            <a id="show-pass" onclick="show_pass()"><span class="show-pass-icon" ><i class="fa-solid fa-eye primary"></i></span></a>
                        </div>

                        <p id="err-pass" class="err-msg"></p>


                        <div class="col-lg-12 form-row">

                            <input type="password" id="repeat_pass" name="repeat_pass"  class="pass-class" placeholder="Confirm Password" onchange="fun_repeat_pass()">
                            <a id="show-pass" onclick="show_pass()"><span class="show-pass-icon" ><i class="fa-solid fa-eye primary"></i></span></a>
                        </div>



                        <p id="err-repass" class="err-msg"></p>




                        <div class="col-lg-12 form-row">

                            <input type="submit" value="Submit" class="submit" id="submit_btn">

                        </div>


                        <div class="col-lg-12 form-row">

                            <h3>Already a Member? <a href="./Login.php">Login</a></h3>

                        </div>



                    </div>

                </form>

			</div>

		</div>
		</div>
    </section>

    <script src="JS\Signin.js">
    </script>
  </body>
</html>
