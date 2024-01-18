
<?php

include_once 'navBar.php';

if(!isset($_SESSION["userEmail"])){
    header("LOCATION:./signIn.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/addAd.css">
</head>

<body>

    

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
                <p>Image 4 </p>
                <input type="file" name="img4" id="img4" required class="input"><br>
                <p>Image 5 </p>
                <input type="file" name="img5" id="img5" required class="input"><br>
                <p>Description </p>
                <textarea name="description" id="description" placeholder="Description" cols="30" rows="10" required class="input"></textarea><br>

                <?php

                if (isset($_POST["add"])) {

                    $date = date('Y-m-d h:i A');
                    $title = $_POST["title"];
                    $place = $_POST["place"];
                    $img1 = "../Uploads/" . basename($_FILES["img1"]["name"]);
                    move_uploaded_file($_FILES["img1"]["tmp_name"], $img1);
                    $img2 = "../Uploads/" . basename($_FILES["img2"]["name"]);
                    move_uploaded_file($_FILES["img2"]["tmp_name"], $img2);
                    $img3 = "../Uploads/" . basename($_FILES["img3"]["name"]);
                    move_uploaded_file($_FILES["img3"]["tmp_name"], $img3);
                    $img4 = "../Uploads/" . basename($_FILES["img4"]["name"]);
                    move_uploaded_file($_FILES["img4"]["tmp_name"], $img4);
                    $img5 = "../Uploads/" . basename($_FILES["img5"]["name"]);
                    move_uploaded_file($_FILES["img5"]["tmp_name"], $img5);
                    $category = $_POST["category"];
                    $description = $_POST["description"];
                    $price = $_POST['price'];

                    include('../../server/DB_Connect.php');

                    $sql = "INSERT INTO `ads`(`ownerMail`,`time`,`title`, `place`, `price`, `description`, `category`, `status`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES ('".$_SESSION["userEmail"]."','" . $date . "','" . $title . "','" . $place . "','" . $price . "','" . $description . "','" . $category . "','pending','" . $img1 . "','" . $img2 . "','" . $img3 . "','" . $img4 . "','" . $img5 . "')";

                    if (mysqli_query($con, $sql)) {
                        echo "<div class='msg'>Post Added Successfully</div>";
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