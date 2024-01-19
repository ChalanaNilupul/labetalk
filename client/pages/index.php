<?php
include('../../server/DB_Connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Ads</title>

    <link rel="stylesheet" href="../css/allAds.css">
    <script src="../js/navBar.js"></script>

    <script src="https://kit.fontawesome.com/8fe8067efd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <?php
    include_once 'navBar.php';
    ?>

    <!-- <div class="filterback" id="filterback">

        </div> -->


    <div class="allAds">

        <div class="filterBtn" onclick="openFilter()">
            <i class="fa-solid fa-filter"></i>
        </div>

        <!-- <p>Home > Rent > Colombo</p> -->

        <div class="adsAreaA">
            <div class="filters" id="filters">
                <div class="close" onclick="openFilter()">
                    <button>X</button>
                </div>
                <div class="filterIn">
                    <form action="./allAds.php" method="POST">
                        <div class="location">
                            Add The location
                            <!-- <input type="text" name="location" id="loc"> -->
                            <select name="location" id="city">
                                <option value="anyCity" selected>Any City</option>
                                <?php
                                $sqlCity = "SELECT * FROM `city` ORDER BY `city_name` ASC";

                                $resultCity = mysqli_query($con, $sqlCity);

                                if (mysqli_num_rows($resultCity) > 0) {
                                    while ($rowCity = mysqli_fetch_assoc($resultCity)) {
                                        echo "<option value='" . $rowCity["city_name"] . "'>" . $rowCity["city_name"] . "</option>";
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="type">
                            Food Category
                            <select name="category" id="cat">
                                <option value="anyCategory" selected>Any Category</option>
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
                        </div>

                        <!-- <div class="qty">
                            <label for="">Rooms</label>
                            <div>
                                <button>-</button>
                                <input type="text" name id disabled>
                                <button>+</button>
                            </div>
                            <label for="">Bathrooms</label>
                            <div>
                                <button>-</button>
                                <input type="text" name id disabled>
                                <button>+</button>
                            </div>

                        </div>
                        <div class="category">
                            <label for="">Preffered Category</label>
                            <div class="categoryIn">
                                <div>Male</div>
                                <div>Female</div>
                                <div>Couple</div>
                                <div>Family</div>
                            </div>
                        </div> -->
                        <div class="price">
                            Price Range
                            <div class="pIn" style="font-weight: 300;">
                                <div>
                                    <label for>Min</label>
                                    <input type="number" name="min" id="minN" min="0" value="0">
                                </div>
                                <div style="padding-left: 10px;">
                                    <label for>Max</label>
                                    <input type="number" name="max" id="max" min="0" value="0">
                                </div>
                            </div>
                        </div>


                        <button name="filter" id="filter" onclick="openFilter()">Search</button>
                        <button onclick="clear()">Clear All</button>
                    </form>
                </div>

            </div>
            <div class="ads" id="ads">

                <script>
                    $(document).ready(function() {
                        // Make an AJAX request
                        $.ajax({
                            url: '../../server/ajax_handler.php', // Path to your PHP file
                            type: 'POST',
                            data: {
                                action: 'getAds'
                            }, // Specify the action
                            success: function(response) {
                                // Update the ads container with the response
                                $('#ads').html(response);
                            },
                            error: function(error) {
                                console.log('Error:', error);
                            }
                        });


                        $('#filter').click(function(e) {
                            e.preventDefault();

                            var formData = {
                                min: $('#minN').val(),
                                max: $('#max').val(),
                                category: $('#cat').val(),
                                location: $('#city').val(),
                                filter: true // Add a flag to indicate that this is a filter request
                            };
                            console.log(formData);
                            // AJAX request
                            $.ajax({
                                type: 'POST',
                                url: '../../server/filterSearch.php', // Update with the correct path to your PHP file
                                data: formData,
                                success: function(response) {
                                    $('#ads').html(response);
                                },
                                error: function() {
                                    alert('Error occurred. Please try again.');
                                }
                            });
                        });


                        $(document).on('click', '.paginationBtn', function(e) {
                           e.preventDefault();
                           
                            var Data = {
                                id: $(this).attr("id"),
                                filter: true // Add a flag to indicate that this is a filter request
                            };
                            console.log(Data);
                            
                            // AJAX request
                            $.ajax({
                                type: 'POST',
                                url: '../../server/pagination.php', // Update with the correct path to your PHP file
                                data: Data,
                                success: function(response) {
                                    $('#ads').html(response);
                                },
                                error: function() {
                                    alert('Error occurred. Please try again.');
                                }
                            });
                        });


                        $(document).on('click', '.paginationBtnFilter', function(e) {
                           e.preventDefault();
                           
                            var Data = {
                                min: $('#minN').val(),
                                max: $('#max').val(),
                                category: $('#cat').val(),
                                location: $('#city').val(),
                                id: $(this).attr("id"),
                                filter: true // Add a flag to indicate that this is a filter request
                            };
                            console.log(Data);
                            
                            // AJAX request
                            $.ajax({
                                type: 'POST',
                                url: '../../server/filterPagination.php', // Update with the correct path to your PHP file
                                data: Data,
                                success: function(response) {
                                    $('#ads').html(response);
                                },
                                error: function() {
                                    alert('Error occurred. Please try again.');
                                }
                            });
                        });


                    });
                </script>


            </div>

        </div>


    </div>

    <?php
    include_once 'footer.php';
    ?>


</body>

</html>