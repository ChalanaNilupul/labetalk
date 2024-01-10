<?php
include('../../server/DB_Connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <div class='img'>
                        <img src='" . $row['img1'] . "' id='mainImg'>
                    </div>
                    <div class='imgSelector'>
                        <!-- <div class='prev'>
                                <
                            </div> -->
                        <div class='imgSet'>
                            <img src='" . $row['img1'] . "' id='one' onclick='one()'>
                            <img src='" . $row['img2'] . "'  id='two' onclick='two()'>
                            <img src='" . $row['img3'] . "'  id='three' onclick='three()'>
                            <img src='" . $row['img2'] . "'  id='four' onclick='four()'>
                            <img src='" . $row['img3'] . "'  id='five' onclick='five()'>
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
    
</body>

</html>