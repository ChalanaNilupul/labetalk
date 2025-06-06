<?php
session_start();
?>

<?php

include('./DB_Connect.php');

$email = $_POST['email'];
$pass = $_POST['pass'];

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM `rusers` WHERE `email`=? AND `password`=?";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a matching row
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["userEmail"] = $email;
        echo "success";
    } else {
        echo "fail";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the error if the statement preparation fails
    echo "Error in preparing SQL statement";
}

// Close the database connection
mysqli_close($con);
?>

