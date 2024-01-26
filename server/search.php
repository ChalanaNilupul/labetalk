<?php

include('./DB_Connect.php');

$word = $_POST['word'];

// Split the input into an array of words
$searchTerms = explode(' ', $word);

// Initialize an empty array to store individual search conditions
$searchConditions = array();

// Build the search conditions for each word
foreach ($searchTerms as $term) {
    $searchConditions[] = "LOWER(title) LIKE '%$term%' OR LOWER(place) LIKE '%$term%' OR LOWER(category) LIKE '%$term%'";
}

// Combine the search conditions using OR
$sql = "SELECT * FROM `ads` WHERE " . implode(' OR ', $searchConditions);

$result = mysqli_query($con, $sql);

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
                    <h4>Rs " . $row["price"] . "</h4>
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

   
    $btns = mysqli_num_rows($result)/9;
    $j= ceil($btns);

    echo "<div class='pagination'>";
    for($i = 1; $i <= $j; $i++){
        echo "<button id='$i' class='paginationBtn' >$i</button>";
    }
    echo "</div>";





} else {
     echo " <div class='results'>
        <input type='text' name='' id='search' class='txtSearch'>
        <button class='btnSearch'> Search </button>
               </div>   ";
    echo "No Items Found";
}
