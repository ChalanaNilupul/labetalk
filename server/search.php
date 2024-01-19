<?php

include('./DB_Connect.php');

$cat = $_POST['category'];
$word = $_POST['word'];

// Split the input into an array of words
$searchTerms = explode(' ', $word);

// Initialize an empty array to store individual search conditions
$searchConditions = array();

// Build the search conditions for each word
foreach ($searchTerms as $term) {
    $searchConditions[] = "LOWER(title) LIKE '%$term%' OR LOWER(place) LIKE '%$term%'";
}

// Combine the search conditions using OR
$sql = "SELECT * FROM `ads` WHERE `category` = '$cat' AND " . implode(' OR ', $searchConditions);

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
                                    <h4>" . $row["price"] . "</h4>
                                    <div>
                                        <ul>
                                           
                                        </ul>
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <p>" . $row["category"] . "</p>
                     </div>
                </a>
        
        
        ";
    }

} else {
    echo "No Items Found";
}






