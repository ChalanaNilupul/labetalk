<?php

session_start();

include('./DB_Connect.php');

$mail = $_POST['email'];

$sql = "DELETE FROM `rusers`
        WHERE `email` ='$mail' ";

$result = mysqli_query($con, $sql);

if (isset($_SESSION["userEmail"]) && $result) {
    echo "Before unset: " . $_SESSION["userEmail"] . "<br>";
    unset($_SESSION["userEmail"]);
    echo "After unset: " . $_SESSION["userEmail"] . "<br>";
} else {
    echo "error: " . mysqli_error($con);
}
