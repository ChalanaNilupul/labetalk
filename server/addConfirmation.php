<?php

include('./DB_Connect.php');


$id = $_POST['id'];

$sql = "UPDATE `ads`
        SET `status`='active'
        WHERE `id` ='$id' ";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "success";

} else {

    echo "error";
}


?>