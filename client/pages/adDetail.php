<?php
include('../../server/DB_Connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="../css/adDetail.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/imgSelector.js"></script>
    <script src="https://kit.fontawesome.com/8fe8067efd.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once 'navBar.php';
    ?>

    <div class="content">
        <div class="contentIn">




            <?php

            $id = $_GET['id'];

            $sql = "SELECT * FROM `ads` WHERE `id`='$id'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                echo "

                    <div class='topic'>
                        <div class='div'>
                            <h2>" . $row['title'] . "</h2>
                            <p>Posted on " . $row['time'] . ", " . $row['place'] . "</p>
                        </div>
                    </div>

                    <div class='images'>

                        <div class='details'>
                        <div class='imgOut' id='carouselContainer'>
                        
                        <button onclick='next();disableBtn()' id='next'><i class='fa-solid fa-arrow-right'></i></button>
                        <button onclick='prev();disableBtn()' id='prev'><i class='fa-solid fa-arrow-left'></i></button>
                            <div class='img' id='carousel'>
                                
                                <div class='slide'><img src='" . $row['img1'] . "' id='mainImg' ></div>
                                <div class='slide'> <img src='" . $row['img2'] . "'  id='two' ></div>
                                <div class='slide'><img src='" . $row['img3'] . "'  id='three' ></div>
                                <div class='slide'><img src='" . $row['img4'] . "'  id='three' ></div>
                                <div class='slide'><img src='" . $row['img5'] . "'  id='three' ></div>

                                
                            </div>
                        </div>
                        <div class='imgSelector'>
                            <!-- <div class='prev'>
                                    <
                                </div> -->
                            <div class='imgSet'>
                                <img src='" . $row['img1'] . "' id='one' >
                                <img src='" . $row['img2'] . "'  id='two' >
                                <img src='" . $row['img3'] . "'  id='three' >
                                <img src='" . $row['img4'] . "'  id='four' >
                                <img src='" . $row['img5'] . "'  id='five' >
                            </div>
                            <!-- <div class='next'>
                                    >
                                </div> -->
                        </div>
                        <h2>RS " . $row['price'] . " /= </h2>
                        <p>Location : " . $row['place'] . "</p>
                        <p>Category : " . $row['category'] . "</p>

                        <p> <b> Description </b> </p>

                        <p>
                            " . $row['description'] . "
                        </p>

                    </div>
                ";

                $sql1 = "SELECT * FROM `rusers` WHERE `email`='" . $row['ownerMail'] . "'";

                $result1 = mysqli_query($con, $sql1);

                if (mysqli_num_rows($result1) > 0) {

                    $row1 = mysqli_fetch_assoc($result1);

                    echo "

                    <div class='seller'>
                    <div class='sDetail'>
                                <div class='div'>
                                    <div class='img'>
                                        <img src='" . $row1['profilePicture'] . "' >
                                    </div>
                                    <div class='name'>
                                        <p><b>" . $row1['name'] . "</b></p>
                                    </div>
                                </div>
                                <div class='number'>
                                    <p> <a href='tel:" . $row1['number'] . "'><i class='fa-solid fa-phone'></i>" . $row1['number'] . "</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                ";
                }
            }


            ?>






        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

    <script>
        const carousel = document.getElementById('carousel');
        const carouselContainer = document.getElementById('carouselContainer');


        //Next button ------------------------------------------------------

        var divW = carousel.offsetWidth / 5;
        var scroll = 0;
        var temp = 0;

        function next() {
            if (carousel.offsetWidth !== scroll + divW) {
                var translateXValue = window.getComputedStyle($('#carousel')[0]).transform;
                var translateX = parseInt(translateXValue.split(',')[4], 10);

                console.log("translateX position:", translateX);

                nextScrl = translateX + (divW * -1);

                carousel.style.transform = `translateX(${nextScrl}px)`;

                scroll += divW;

                // Reset scroll when reaching the last item
                if (scroll >= carousel.offsetWidth) {
                    scroll = 0;
                }
            }
        }




        //Prev button ------------------------------------------------------

        function prev() {

            var translateXValue = window.getComputedStyle($('#carousel')[0]).transform;

            // Extract the translateX value from the matrix
            var translateX = parseInt(translateXValue.split(',')[4], 10);

            if (translateX == divW * 3) {
                translateX = -1 * (divW * 3)
            }



            if (translateX < 0) {

                prevScrl = translateX + (divW);

                carousel.style.transform = `translateX(${prevScrl}px)`;

                // console.log("translateX position:", translateX);

                scroll -= divW;

                if (translateX > -1 * ((divW + 5))) {
                    carousel.style.transform = `translateX(0px)`;
                    //console.log('diyaaa')
                }

                //console.log(translateX)

            } else {
                console.log('first')
                carousel.style.transform = `translateX(0px)`;
            }


        }

        var touchMoveInProgress = false;

        function handleTouchStart(event) {
            startX = event.touches[0].clientX;
            console.log(startX);
            touchMoveInProgress = false; // Reset the flag on touch start
        }

        function handleTouchMove(event) {
            if (!touchMoveInProgress) {
                touchMoveInProgress = true; // Set the flag to indicate touch move is in progress
                var currentX = event.touches[0].clientX;
                var diffX = startX - currentX;
                console.log('cc ' + currentX);
                console.log('dddd ' + diffX);

                if (diffX > 0) {
                    // Swipe left
                    next();

                    startX = currentX; // Update start position for the next move
                    $('#carousel').prop('disabled', true);
                    setTimeout(() => {
                        $('#carousel').prop('disabled', false);
                    }, 350);
                } else if (diffX < 0) {
                    // Swipe right
                    prev();

                    startX = currentX; // Update start position for the next move
                    $('#carousel').prop('disabled', true);
                    setTimeout(() => {
                        $('#carousel').prop('disabled', false);
                    }, 350);
                }
                // No need to update startX outside of the conditionals
            }
        }

        function handleTouchEnd() {
            console.log("Touch interaction ended");

            // Example: Reset any variables or states related to touch tracking
            startX = null;
            touchMoveInProgress = false; // Reset the flag on touch end
        }

        // Attach touch event listeners to your carousel element
        carousel.addEventListener('touchstart', handleTouchStart, false);
        carousel.addEventListener('touchmove', handleTouchMove, false);
        carousel.addEventListener('touchend', handleTouchEnd, false);

        function disableBtn() {
            $('#next').prop('disabled', true);
            $('#prev').prop('disabled', true);
            setTimeout(() => {
                $('#next').prop('disabled', false);
                $('#prev').prop('disabled', false);
            }, 350);
        }
    </script>

</body>

</html>