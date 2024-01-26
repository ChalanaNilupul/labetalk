<?php

include('./DB_Connect.php');

$name = $_POST['name'];
$location = $_POST['location'];
$num = $_POST['number'];
$mail = $_POST['mail'];

$sql = "UPDATE `rusers`
        SET `name`='$name',`number`='$num',`location`='$location'
        WHERE `email` ='$mail' ";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "success";

} else {

    echo "error";
}


?>