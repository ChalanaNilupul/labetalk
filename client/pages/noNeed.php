<?php
include('../../server/DB_Connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wikunamu.lk</title>
    <link rel="icon" href="../resources/Product.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/8fe8067efd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>

    <?php
    include_once 'navBar.php';
    ?>

    <div class="landing">
        <img src="../resources/govi.png" id="govi" alt="">
        <img id="back" src="../resources/b2.jpg" alt="">
    </div>


    <div class="search">
        <select name='category' id='category'>
            <?php

            $sqlCategory = "SELECT * FROM `category`";

            $resultCategory = mysqli_query($con, $sqlCategory);

            if (mysqli_num_rows($resultCategory) > 0) {
                while ($rowCategory = mysqli_fetch_assoc($resultCategory)) {
                    echo "<option value='" . $rowCategory["category"] . "'>" . $rowCategory["category"] . "</option>";
                }
            }

            ?>
        </select>
        <input type="text" name="search" id="search" placeholder="Search here">
        <button id="srcBtn">Search</button>
    </div>






    <div class="ads">
        <h1>Explore Properties</h1>
        <div class="adsIn">


            <?php

            include('../../server/DB_Connect.php');

            $sql = "SELECT * FROM `ads` WHERE `status`='active' LIMIT 12";

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
            }


            ?>


        </div>

        <div class="allAddiv"><a href="./allAds.php" id="allAd"><button>View All</button></a></div>

    </div>



    <?php
    include_once 'footer.php';
    ?>


    <script>
        $(document).ready(function() {
            $('#srcBtn').click(function() {

                var category = $('#category').val()
                var word = $('#search').val()

                var formData = {
                    category: category,
                    word: word
                };

                // AJAX request
                $.ajax({
                    type: 'POST',
                    url: '../../server/search.php', // Update with the correct path to your PHP file
                    data: formData,
                    success: function(response) {
                        $('.adsIn').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log the response text for debugging
                        console.log(status); // Log the status for debugging
                        console.log(error); // Log the error for debugging
                        alert('Error occurred. Please try again.');
                    }
                });

            })

        })
    </script>

</body>

</html>