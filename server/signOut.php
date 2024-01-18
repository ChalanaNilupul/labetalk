<?php

session_start();
unset($_SESSION["userEmail"]);
header("location:../client/pages/index.php");

?>
