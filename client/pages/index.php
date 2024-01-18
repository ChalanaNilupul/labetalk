<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wikunamu.lk</title>
        <link rel="icon" href="../resources/Product.ico" type="image/x-icon" />
        <script src="https://kit.fontawesome.com/8fe8067efd.js"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/navBar.css">
        <link rel="stylesheet" href="../css/footer.css">
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
            <select>
                <option value="">Rent</option>
            </select>
            <input type="text" name="search" id="search" placeholder="Search here">
            <button>Search</button>
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

                        echo"
                        
                        <a href>
                            <div class='card'>
                                <div class='imgAd'>
                                    <img src='".$row["img1"]."' alt>
                                </div>
                                <h3>".$row["title"]."</h3>
                                <div class='info'>
                                    <h4>".$row["price"]."</h4>
                                    <div>
                                        <ul>
                                            <li><i class='fa-solid fa-bed'></i></li>
                                            <li>2</li>
                                        </ul>
                                        <ul>
                                            <li><i class='fa-solid fa-bath'></i></li>
                                            <li>1</li>
                                        </ul>
                                    </div>
                                </div>
                                <p>".$row["category"]."</p>
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


    </body>
</html>