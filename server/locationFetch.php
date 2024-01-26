<?php

include('./DB_Connect.php');

$dis = mysqli_real_escape_string($con, $_POST['district']);
$dis = trim($dis); // Trim the value

$sql = "
    SELECT `city_name`
    FROM `city`
    JOIN `district` ON `city`.`district_id` = `district`.`district_id`
    WHERE `district`.`district_name` = '".$dis."'
    ORDER BY `city_id` DESC;
";



$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    
    

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='cName'>".$row['city_name']."</li>"; 
    }

   
}
else{
    echo "Server Error";
    echo "$sql";
}
?>
