<?php
session_start();
$_SESSION['user_id'] = NULL;
$_SESSION["logged"] = false;
header("location: index.php")
?>
<html>

</html>