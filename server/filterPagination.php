<?php

include('./DB_Connect.php');

$min = $_POST['min'];
$max = $_POST['max'];
$category = $_POST['category'];
$location = $_POST['location'];
$id = $_POST['id'];
$start = ($id*9) - 9;

if ($min == 0 && $max == 0 && $category == "anyCategory" && $location == "anyCity") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active'";
}
if ($min == 0 && $max == 0 && $category != "anyCategory" && $location != "anyCity") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `category` = '$category'
        AND `place` = '$location' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `category` = '$category'
        AND `place` = '$location'";
}
if (($min == 0 || $min != 0) && $max != 0 && $category != "anyCategory" && $location == "anyCity") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `category` = '$category'
        AND `price` >= '$min' AND `price` <= '$max' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `category` = '$category'
        AND `price` >= '$min' AND `price` <= '$max'";
}
if (($min == 0 || $min != 0) && $max != 0 && $category == "anyCategory" && $location != "anyCity") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `place` = '$location'
        AND `price` >= '$min' AND `price` <= '$max' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' 
        AND `place` = '$location'
        AND `price` >= '$min' AND `price` <= '$max' ";
}
if ($min == 0 && $max == 0 && $category == "anyCategory" && $location != "anyCity") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' AND `place` = '$location' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' AND `place` = '$location'";
}
if ($category == "anyCategory" && $location == "anyCity" && ($min == 0 || $min != 0)  && $max != 0) {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' AND (`price` >= '$min' AND `price` <= '$max') LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' AND (`price` >= '$min' AND `price` <= '$max')";
}
if ($min == 0 && $max == 0 && $location == "anyCity" && $category != "anyCategory") {
    $sql = "SELECT * FROM `ads` WHERE `status`='active' AND `category` = '$category' LIMIT $start,9";
    $sqlCount  = "SELECT * FROM `ads` WHERE `status`='active' AND `category` = '$category'";
}
if (($min == 0 || $min != 0) && $max != 0 && $category != "anyCategory" && $location != "anyCity") {
    $sql = "SELECT * FROM `ads`
         WHERE `status` = 'active'
         AND (`price` >= '$min' AND `price` <= '$max'
         AND `category` = '$category'
         AND `place` = '$location')
         LIMIT $start,9;";
    $sqlCount  = "SELECT * FROM `ads`
         WHERE `status` = 'active'
         AND (`price` >= '$min' AND `price` <= '$max'
         AND `category` = '$category'
         AND `place` = '$location');";
}

$result = mysqli_query($con, $sql);

//result count
$resultCount = mysqli_query($con, $sqlCount);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "
                
                <a href='./adDetail.php?id=" . $row["id"] . " ''>
                    <div class='card'>
                        <div class='imgAd'>
                            <img src='" . $row["img1"] . "' alt>
                        </div>
                        <h3>" . $row["title"] . "</h3>
                        <div class='info'>
                            <h4>" . $row["price"] . "</h4>
                            <div>
                                <ul>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul> 
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        <p>" . $row["category"] . "</p>
                    </div>
                </a>
                
                
                
                ";
    }
    echo " <div class='results'>
    <input type='text' name='' id='search' class='txtSearch'>
    <button class='btnSearch'> Search </button>
               </div>   ";

    $btns = mysqli_num_rows($resultCount) / 9;
    $j = ceil($btns);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $j; $i++) {
        echo "<button id='$i' class='paginationBtnFilter'>$i</button>";
    }
    echo "</div>";

} else {
    echo " <div class='results'>
    <input type='text' name='' id='search' class='txtSearch'>
    <button class='btnSearch'> Search </button>
                </div>   ";
    echo "No Results Found For Your Search";
}
