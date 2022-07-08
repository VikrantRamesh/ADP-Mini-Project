<?php
function check_login($con)
{
    if (isset($_SESSION['user_id']) && $_SESSION["logged"] == true) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users where user_id = '$id' limit 1";

        $res = mysqli_query($con, $query);

        if ($res && mysqli_num_rows($res) > 0) {
            $user_data = mysqli_fetch_assoc($res);
            return true;
        }
    }

    //redirect to login as user id is not set in session
    return false;
}

function random_num($len)
{
    $text = "";
    if ($len < 5) {
        $len = 5;
    }

    $length = rand(4, $len);
    $i = 0;
    for ($i; $i < $length; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}