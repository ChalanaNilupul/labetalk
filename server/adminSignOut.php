<?php

session_start();
unset($_SESSION["adminEmail"]);
header("location:../client/pages/signInAdmin.php");

?>