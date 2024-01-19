<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav bar</title>
    <link rel="stylesheet" href="../css/navBar.css">
    <script src="../js/navBar.js"></script>
</head>
<body>
    <div class="navBar">
        <div class="img"><a href="./index.php"><img src="../resources/logo.png" alt=""></a></div>
        <!-- <div class="lan">
            <a href="">தமிழ் / </a>
            <a href="">සිං</a>
        </div> -->
        <div class="link">
            <ul>
                
                <?php  
                
                if(isset($_SESSION['userEmail'])){
                    echo "<li style='padding-top: 3px;'><a href='./account.php'>Account</a></li>";
                }
                else{
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
                
                if(isset($_SESSION['userEmail'])){
                    echo "<li style='padding-top: 3px;'><a href='./account.php'>Account</a></li>";
                }
                else{
                    echo "<li style='padding-top: 3px;'><a href='./signIn.php'>Login</a></li>";
                }

                ?>
                    <li style="padding-top: 3px;"><a href="./about.php">About Us</a></li>
                    <li style="padding-top: 3px;"><a href="./contact.php">Contact</a></li>
                   
                    
                </ul>
            </div>
            <div class="lan">
                <a href="">தமிழ் / </a>
                <a href="">සිං</a>
            </div>
        </div>

    </div>



</body>
</html>