<?php

include('./DB_Connect.php');
// Check if the request is an AJAX request
if (isset($_POST['action']) && $_POST['action'] == 'getAds') {
    // Include the file containing the displayAds function
    include './allAdList.php';

    // Call the displayAds function with the appropriate parameters
    displayAds();
}

?>