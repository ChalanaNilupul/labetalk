<?php

include('./DB_Connect.php');

$pass = $_POST['pass'];
$mail = $_POST['email'];

$sql = "UPDATE `rusers`
        SET `password`='$pass'
        WHERE `email` ='$mail' ";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "success";

} else {

    echo "error";
}


?>