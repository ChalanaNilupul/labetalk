<?php
include('../../server/DB_Connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>All Ads</title>
    <meta name="title" content="LabetaLK - Your Source for Fresh, Local Foods">
    <meta name="description" content="Discover and support local farmers with LabetaLK. Find fresh, locally grown foods and handmade products. Explore a diverse selection of farm-to-table options in our marketplace.">
    <meta name="keywords" content="LabetaLK, local foods, farmers market, fresh produce, handmade goods, farm-to-table, organic, sustainable, food ads, food marketplace">
    <meta name="author" content="LabetaLK">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://labetalk.com/">
    <meta property="og:title" content="LabetaLK - Your Source for Fresh, Local Foods">
    <meta property="og:description" content="Discover and support local farmers with LabetaLK. Find fresh, locally grown foods and handmade products. Explore a diverse selection of farm-to-table options in our marketplace.">
    <meta property="og:image" content="../resources/labeta-01.png">

    <meta property="twitter:card" content="LabetaLK">
    <meta property="twitter:url" content="https://labetalk.com/">
    <meta property="twitter:title" content="LabetaLK - Your Source for Fresh, Local Foods">
    <meta property="twitter:description" content="Discover and support local farmers with LabetaLK. Find fresh, locally grown foods and handmade products. Explore a diverse selection of farm-to-table options in our marketplace.">
    <meta property="twitter:image" content="../resources/labeta-01.png">
    <link rel="icon" href="../resources/labeta-01.ico" type="image/ico">

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

        <!-- <div class="filterBtn" onclick="openFilter()">
            <i class="fa-solid fa-filter"></i>
        </div> -->



        <div class="adsAreaA">
            <div class="filters" id="filters">
                <div class="close" onclick="openFilter()">
                    <button>X</button>
                </div>
                <div class="filterIn">
                    <form action="" method="POST">

                        <div class="align">
                            <div class="locationOut">
                                Location
                                <input type="text" name="place" id="place" placeholder="Any City" required class="input place" style="outline:none;cursor:pointer" readonly><br>

                                <div class="location">
                                    <div class="locationIn">

                                        <?php
                                        $sql1 = "SELECT * FROM `district`";

                                        $resultC = mysqli_query($con, $sql1);

                                        if (mysqli_num_rows($resultC) > 0) {
                                            echo "<p class='dName' style='margin-bottom:10px;cursor:pointer'><b>Any City</b></p>";
                                            while ($rowC = mysqli_fetch_assoc($resultC)) {
                                                echo "<div class='lList'>
                                            <p class='dName'><b>" . $rowC['district_name'] . "</b></p>
                                            <ul class='list'> </ul>
                                            
                                            </div>  ";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

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
                        </div>
                        <div class="price" id="priceSelect">
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

                        <div class="align">
                            <button name="filter" id="filter">Search</button>
                            <button onclick="clear()">Clear All</button>
                        </div>
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

                            var locationSet=$('#place').val();
                            if(locationSet === 'Any City'){
                                locationSet = 'anyCity'
                            }

                            var formData = {
                                min: $('#minN').val(),
                                max: $('#max').val(),
                                category: $('#cat').val(),
                                location: locationSet,
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
                            //console.log(Data);

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

                            var locationSet=$('#place').val();
                            if(locationSet === 'Any City'){
                                locationSet = 'anyCity'
                            }
                            if(locationSet === ''){
                                locationSet = 'anyCity'
                            }
                            //console.log('locationSet'+locationSet)
                            var Data = {
                                min: $('#minN').val(),
                                max: $('#max').val(),
                                category: $('#cat').val(),
                                location: locationSet,
                                id: $(this).attr("id"),
                                filter: true // Add a flag to indicate that this is a filter request
                            };
                           //console.log(Data);

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

                        $(document).on('click', '.btnSearch', function() {

                            var word = $('#search').val()

                            if (word !== '') {
                                var formData = {
                                    word: word
                                };

                                // AJAX request
                                $.ajax({
                                    type: 'POST',
                                    url: '../../server/search.php', // Update with the correct path to your PHP file
                                    data: formData,
                                    success: function(response) {
                                        $('#ads').html(response);
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText); // Log the response text for debugging
                                        console.log(status); // Log the status for debugging
                                        console.log(error); // Log the error for debugging
                                        alert('Error occurred. Please try again.');
                                    }
                                });

                            }



                        })



                        // Location fetch

                        $('.place').click(function(e) {
                            $('.location').toggleClass('active');
                            $(this).css('margin-bottom', '5px')
                        })

                        $(document).on('click', '.dName', function(e) {
                            var districtWord = $(this).text();
                            var parent = $(this).parent();

                            $('#place').val(districtWord);
                            parent.toggleClass('active');

                            if (districtWord !== 'Any City') {
                                if (parent.hasClass('active')) {
                                    var formData = {
                                        district: districtWord,
                                    };

                                    // AJAX request
                                    $.ajax({
                                        type: 'POST',
                                        url: '../../server/locationFetch.php',
                                        data: formData,
                                        success: function(response) {
                                            // Ensure that the '.dName' element is always present in the HTML content
                                            var newContent = "<p class='dName'><b>" + districtWord + "</b></p>" + response + "";
                                            parent.html(newContent);
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                            console.log(status);
                                            console.log(error);
                                            alert('Error occurred. Please try again.');
                                        }
                                    });
                                } else {
                                    parent.html("<p class='dName'><b>" + districtWord + "</b></p>");
                                }
                            }
                            else{
                                //console.log('Any city')
                                parent.toggleClass('active');
                                $('.location').toggleClass('active');
                            }
                            


                        });

                        $(document).on('click', '.cName', function(e) {
                            var parent = $(this).parent();
                            var city = $(this).text();
                            var dis = $(this).parent().find('p').text();

                            console.log(city.length + 'sdsd')

                            $('#place').val(city);

                            parent.html("<p class='dName'><b>" + dis + "</b></p>");
                            $('.location').toggleClass('active');
                            parent.toggleClass('active');
                        })

                    });



                    function city() {
                        var target = $('.lList.active');
                        var targetText = $('.lList.active .dName').text();
                        $('.location').toggleClass('active');
                        target.html("<p class='dName'><b>" + targetText + "</b></p>");
                    }

                    function allOf() {
                        city = $('#place').val();
                        $('#place').val(dis + ',' + city);
                    }
                </script>


            </div>

        </div>


    </div>

    <?php
    include_once 'footer.php';
    ?>



</body>

</html>