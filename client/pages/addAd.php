
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

                        $mail = 'nilupul2001chalana@gmail.com';
     

                        $to         = $email;
                        $mail_subject = 'Goviya.lk';
                        $email_body   = "
                        
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Document</title>
                        <style>
                    body
                    {
                        text-align: center;
                        font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';
                        
                    }
                    *{
                        padding: 0px;
                        margin: 0px;
                        box-sizing: border-box;
                    }
                    .content
                    {
                        justify-content: center;
                        flex: wrap;
                        display:flex ;
                        width: 100%;
                        background-color: rgb(0, 0, 0);
                        justify-content: center;
                    padding:50px 20px;
                    }
                    .out
                    {
                        justify-content: center;
                        flex: wrap;
                        display:block ;
                    }
                    .banner
                    {
                        font-size: 30px;
                        height: 50px;
                        width: 100%;
                        background-color: #ffb800;
                        color: white;
                        padding: 20px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .in
                    {
                        margin-top: 10px;
                        color: rgb(255, 255, 255);
                        font-size: 25px;
                        width: 100%;
                        padding: 20px;
                    }

                        </style>
                    </head>
                    <body>
                        <div class='content'>
                            <div class='out'>
                                    <div class='banner'>
                                        Goviya.lk
                                    </div>
                                    <div class='in'>
                                        Your Ad was successfully posted, stay in touch
                                    </div>
                                    <div class='in' style='margin-top: 0;font-size:19px'>
                                        cgraphyweb@gmail.com
                                    </div>
                            </div>

                        </div>
                    </body>
                    </html>
                        
                        
                        ";
     

      $header       = "From: {$mail}\r\nContent-Type: text/html;";

      $send_mail_result = mail($to, $mail_subject, $email_body, $header);

      if ($send_mail_result) {
       
      } else {
        echo "Message Not Sent.";
      }


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