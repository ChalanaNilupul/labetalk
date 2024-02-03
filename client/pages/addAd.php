<?php

include_once 'navBar.php';

if (!isset($_SESSION["userEmail"])) {
    header("LOCATION:./signIn.php");
}

include('../../server/DB_Connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Ad</title>
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
    <link rel="icon" href="../resources/labeta-01.ico"
            type="image/ico">
    <link rel="stylesheet" href="../css/addAd.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>



    <div class="container">
        <div class="form">
            <form action="addAd.php" method="POST" enctype="multipart/form-data">
                <h1>Post Ad</h1>
                <p>Title </p>
                <input type="text" name="title" id="title" placeholder="Title" required class="input"><br>
                <p>Location </p>
                <input type="text" name="place" id="place" placeholder="Location" required class="input place" style="outline:none;cursor:pointer" readonly><br>

                <div class="location">
                    <div class="locationIn">

                        <?php
                        $sql1 = "SELECT * FROM `district`";

                        $resultC = mysqli_query($con, $sql1);

                        if (mysqli_num_rows($resultC) > 0) {
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




                <p>Price(Rs) </p>
                <input type="text" name="price" id="price" placeholder="Price" required class="input"><br>
                <p>Category </p>
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
                </select><br>
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



                    $sql = "INSERT INTO `ads`(`ownerMail`,`time`,`title`, `place`, `price`, `description`, `category`, `status`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES ('" . $_SESSION["userEmail"] . "','" . $date . "','" . $title . "','" . $place . "','" . $price . "','" . $description . "','" . $category . "','pending','" . $img1 . "','" . $img2 . "','" . $img3 . "','" . $img4 . "','" . $img5 . "')";

                    if (mysqli_query($con, $sql)) {
                        echo "<div class='msg'>Post Added Successfully</div>";

                        $mail = 'info@labetalk.com';


                        $to         = $_SESSION["userEmail"];
                        $mail_subject = 'labetaLK';
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
                                        labetaLK.com
                                    </div>
                                    <div class='in'>
                                        Your ad is under review, we will make it live shortly
                                    </div>
                                    <div class='in' style='margin-top: 0;font-size:19px'>
                                        labetalk.com
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


    <script>
        $(document).ready(function() {

            $('.place').click(function(e) {
                $('.location').toggleClass('active');
                $(this).css('margin-bottom', '5px')
            })

            $(document).on('click', '.dName', function(e) {
                var districtWord = $(this).text();
                var parent = $(this).parent();

                $('#place').val(districtWord);
                parent.toggleClass('active');

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
            });

            $(document).on('click', '.cName', function(e) {
                var parent = $(this).parent();
                var city = $(this).text();
                var dis = $(this).parent().find('p').text();

                console.log(dis)

                $('#place').val(dis + ',' + city);
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

    </script>


</body>

</html>