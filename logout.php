<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["welcomeMessage"]);
session_destroy();
header("Location:index.php");
?>
