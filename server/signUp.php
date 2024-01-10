<?php

include('./DB_Connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$num = $_POST['number'];

$sql = "SELECT * FROM `rusers` WHERE `Email`='" . $email . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "Registered";

} else {

    $sql1 = "INSERT INTO `rusers` (`name`,`email`,`profilePicture`,`password`,`number`) VALUES ('" . $name . "','" . $email . "','../Uploads/PPic/default.png','" . $pass . "','" . $num . "');";

    if(mysqli_query($con, $sql1)){
        echo "success";
    }
}



?>