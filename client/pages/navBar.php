<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="icon" href="../resources/labeta-01.ico" type="image/ico">

    <meta name="geo.placename" content="Sri Lanka">
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



    <link rel="stylesheet" href="../css/navBar.css">
    <script src="../js/navBar.js"></script>


</head>

<body>
    <div class="navBar">
        <div class="img"><a href="./index.php"><img src="../resources/l.png" alt=""></a></div>
        <!-- <div class="lan">
            <a href="">தமிழ் / </a>
            <a href="">සිං</a>
        </div> -->
        <div class="link">
            <ul>

                <?php

                if (isset($_SESSION['userEmail'])) {
                    echo "<li style='padding-top: 3px;'><a href='./account.php'>Account</a></li>";
                } else {
                    echo "<li style='padding-top: 3px;'><a href='./signIn.php'>Login</a></li>";
                }

                ?>
                <li style="padding-top: 3px;"><a href="./about.php">About Us</a></li>
                <li style="padding-top: 3px;"><a href="./contact.php">Contact</a></li>
                <li><a href="./addAd.php"><button>Post</button></a></li>
            </ul>
        </div>

    </div>


    <!-- -------------------------------------------mobile responsive ---------------------------------------------------------->


    <div class="menubar" onclick="nav()" id="menubar">
        <i class="fa-solid fa-bars"></i>
    </div>

    <div class="postAdd" onclick="nav()">
        Post Add
    </div>

    <div class="navBarMobile" id="navBarMobile">

        <div class="min" id="min">
            <div class="link">
                <ul>
                    <?php

                    if (isset($_SESSION['userEmail'])) {
                        echo "<li style='padding-top: 3px;'><a href='./account.php'>Account</a></li>";
                    } else {
                        echo "<li style='padding-top: 3px;'><a href='./signIn.php'>Login</a></li>";
                    }

                    ?>
                    <li style="padding-top: 3px;"><a href="./about.php">About Us</a></li>
                    <li style="padding-top: 3px;"><a href="./contact.php">Contact</a></li>
                    <li style="padding-top: 3px;"><a href="./addAd.php">Post</a></li>


                </ul>
            </div>
            <!-- <div class="lan">
                <a href="">தமிழ் / </a>
                <a href="">සිං</a>
            </div> -->
        </div>

    </div>



</body>

</html>