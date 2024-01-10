<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/addAd.css">
</head>

<body>

<?php
    include_once 'navBar.php';
    ?>

    <div class="container">
        <div class="form">
            <form action="addAd.php" method="POST" enctype="multipart/form-data">
                <h1>Post Ad</h1>
                <p>Title </p>
                <input type="text" name="title" id="title" placeholder="Title" required class="input"><br>
                <p>Location </p>
                <input type="text" name="place" id="place" placeholder="Place" required class="input"><br>
                <p>Price(Rs) </p>
                <input type="text" name="price" id="price" placeholder="Price" required class="input"><br>
                <p>Category </p>
                <input type="text" name="category" id="category" placeholder="Category" required class="input"><br>
                <p>Image 1 </p>
                <input type="file" name="img1" id="img1" required class="input"><br>
                <p>Image 2 </p>
                <input type="file" name="img2" id="img2" required class="input"><br>
                <p>Image 3 </p>
                <input type="file" name="img3" id="img3" required class="input"><br>
                <p>Description </p>
                <textarea name="description" id="description" placeholder="Description" cols="30" rows="10" required class="input"></textarea><br>

                <?php

                if (isset($_POST["add"])) {

                    $date = date('Y-m-d h:i A');
                    $title = $_POST["title"];
                    $place = $_POST["place"];
                    $img = "../Uploads/" . basename($_FILES["img"]["name"]);
                    move_uploaded_file($_FILES["img"]["tmp_name"], $img);
                    $category = $_POST["category"];
                    $description = $_POST["description"];
                    $price = $_POST['price'];

                    include('../../server/DB_Connect.php');

                    $sql = "INSERT INTO `ads`(`time`,`title`, `place`, `price`, `description`, `category`, `status`, `img1`, `img2`, `img3`) VALUES ('" . $date . "','" . $title . "','" . $place . "','" . $price . "','" . $description . "','" . $category . "','pending','" . $img . "','" . $img . "','" . $img . "')";

                    if (mysqli_query($con, $sql)) {
                        echo "Successfull";
                    } else {
                        echo "Error";
                    }
                }

                ?>

                <button name="add" id="add">Post</button>
            </form>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>
</body>

</html>