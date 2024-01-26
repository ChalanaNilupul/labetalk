<?php


include_once 'navBar.php';


if (!isset($_SESSION["userEmail"])) {
    header("LOCATION:./signIn.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
    <link rel="stylesheet" href="../css/account.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/8fe8067efd.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <div class="msg" id="msg">dsd</div>
    <div class="deleteWindow">

    </div>
    <div class="dmsg">
        <div>
            <p>Are you sure you want to delete your account? this will delete your account permanently</p>
            <button id='yes'>Yes</button>
            <button id='no'>No</button>
        </div>
    </div>


    <div class="main">
        <div class="parent_container">
            <div class="container">
                <div class="head">
                    <h1>My Account</h1>
                </div>
                <div class="sub_container">
                    <div class="menu">
                        <div class="menu_context">
                            <a href="#" class="tab_name" id="Myads_menu_id" onclick="ads()"><span>My
                                    ads</span></a>
                            <!-- <a href="#" class="tab_name"
                                    id="Favourite_menu_id"><span>Favourite</span></a> -->
                            <a href="#" class="tab_name" id="Settings_menu_id" onclick="settings()"><span>Settings</span></a>
                        </div>
                    </div>

                    <div class="content">
                        <div class="myads">


                            <?php

                            include('../../server/DB_Connect.php');

                            $sql = "SELECT * FROM `ads` WHERE `ownerMail`='" . $_SESSION["userEmail"] . "'";

                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "
                                    <a href='./adDetail.php?id=".$row['id']."'>
                                        <div class='adCards'>
                                            <div class='adImgs'>
                                                <img src='".$row['img1']."' >
                                            </div>
                                            <div class='adDetails'>
                                                <h3>".$row['title']."</h3>
                                                <p>".$row['place']." | ".$row['category']."</p>
                                                <p>Rs ".$row['price']."/=</p>
                                            </div>
                                        </div>
                                    </a>
                                    ";
                                }
                            }
                            ?>

                            


                        </div>

                        <div class="settings" id="settings_id">
                            <span class="settings_head">Settings
                                <hr>
                            </span>

                            <?php

                            include('../../server/DB_Connect.php');

                            $sql = "SELECT * FROM `rusers` WHERE `email`='" . $_SESSION["userEmail"] . "'";

                            $result = mysqli_query($con, $sql);

                            $usermail = $_SESSION["userEmail"];

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);

                                echo "
                                    
                                    <span class='settings_basic'>E-mail : </span>
                                    <input type='text' id='user_email' class='settings_txt_fields' value='" . $_SESSION["userEmail"] . "' readonly disabled>
                                    <span class='settings_basic'>Name :</span>
                                    <span id='error'></span>
                                    <input type='text' id='user_name' class='settings_txt_fields name' placeholder='Change Your Name' value='" . $row["name"] . "'>
                                    <span class='settings_basic'>Location :</span>
                                    <input type='text' id='user_location' class='settings_txt_fields location' placeholder='Change Your Location' value='" . $row["location"] . "'>
                                    <span class='settings_basic'>Number :</span>
                                    <input type='text' id='user_location' class='settings_txt_fields num' placeholder='Contact Number' value='" . $row["number"] . "'>
        
                                    <div class='settings_btns'>
                                        <button type='submit' class='settings_update_btn' id='settings_update_btn_id'><span class='signup_regtxt'>Update</span></button>
                                    </div>
                                    
                                    
                                    ";
                            }



                            ?>




                            <span class="settings_head"> Change Password
                                <hr>
                            </span>

                            <span class="settings_basic">Password :</span>
                            <input type="password" id="user_password" class="settings_txt_fields pass" placeholder="Enter Your Password" required>
                            <span class="settings_basic">Confirm Password
                                :</span> <input type="password" id="user_confirm_password" class="settings_txt_fields conPass" placeholder="Confirm Your Password" required>
                            <span id='passError'>ddf</span>
                            <div class="settings_btns">
                                <button type="submit" class="settings_update_btn" id="password_update_btn"><span class="signup_regtxt">Change</span></button>
                            </div>

                            <div class="delete_logout_btn">
                                <div class="delete_logout_both_btn">
                                    <button type="submit" class="delete_logout_acc" id="delete_acc_id"><span class="signup_regtxt">Delete
                                            Account</span></button>
                                    <button type="submit" class="delete_logout_acc" id="logout_id"><span class="signup_regtxt">Log
                                            Out</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>


</body>

<script>
    function ads() {
        $('.myads').css("display", "block");
        $('.settings').css("display", "none");

    }

    function settings() {
        $('.myads').css("display", "none");
        $('.settings').css("display", "flex");
    }
</script>

<script>
    function updateDetail() {
        $('.msg').text('Details Updated Successfully');
        $('.msg').css('display', 'flex');
        $('.msg').css('opacity', '1');
        setTimeout(() => {
            $('.msg').css('opacity', '0');
            setTimeout(() => {
                $('.msg').css('display', 'none');
            }, 500);
        }, 3000);
    }

    function updatePass() {
        $('.msg').text(' Password Updated Successfully');
        $('.msg').css('display', 'flex');
        $('.msg').css('opacity', '1');
        setTimeout(() => {
            $('.msg').css('opacity', '0');
            setTimeout(() => {
                $('.msg').css('display', 'none');
            }, 500);
        }, 3000);
    }



    $(document).ready(function() {
        var height = $('.settings').height();
        var width = $(window).width();

        $('.parent_container').css("height", height + 160);
        if (width <= 540) {
            $('.parent_container').css("height", height + 260);
        }

        window.addEventListener('resize', function() {
            var width = $(window).width();
            //console.log(width)
            $('.parent_container').css("height", height + 160);

            if (width <= 540) {
                $('.parent_container').css("height", height + 260);
            }
        });


        $("#logout_id").click(function(e) {
            window.location.href = '../../server/signOut.php';
        })






        //change details


        function isValidPass(pass, conPass) {

            if (pass.length >= 8) {
                if (pass === conPass) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return error;
            }

        }

        function validName(name) {
            var regex = /^[a-zA-Z\s]+$/;

            if (!regex.test(name)) {
                return false;
            } else {
                return true;
            }

        }

        $('#settings_update_btn_id').click(function(e) {
            e.preventDefault();

            var name = $('.name').val();
            var location = $('.location').val();
            var number = $('.num').val();
            var mail = $('#user_email').val();

            var ifvalidName = validName(name);

            if (ifvalidName === true) {
                $('#error').css('display', 'none');

                var dataSet = {
                    name: name,
                    location: location,
                    number: number,
                    mail: mail
                };

                //console.log(dataSet);

                $.ajax({

                    type: 'POST',
                    url: '../../server/accUpdate.php', // Update with the correct path to your PHP file
                    data: dataSet,
                    success: function(response) {

                        updateDetail();

                        //console.log(response)
                    },
                    error: function() {
                        alert('Error occurred. Please try again.');
                    }

                });

            } else {
                $('#error').css('display', 'flex');
                $('#error').text('Special Characters Not Allowed');
            }


        })




        //change password

        $('#password_update_btn').click(function(e) {
            e.preventDefault();

            var pass = $('.pass').val();
            var conPass = $('.conPass').val();
            var mail = $('#user_email').val();

            var passCheck = isValidPass(pass, conPass);

            var dataSet = {
                email: mail,
                pass: pass,
            };

            if (pass === "" && conPass === "") {

            } else {

                if (passCheck === true) {
                    $('#passError').css('display', 'none');

                    $.ajax({

                        type: 'POST',
                        url: '../../server/passUpdate.php', // Update with the correct path to your PHP file
                        data: dataSet,
                        success: function(response) {
                            $('.pass').val("");
                            $('.conPass').val("");
                            updatePass();

                            //console.log(response)
                        },
                        error: function() {
                            alert('Error occurred. Please try again.');
                        }

                    });
                }
                if (passCheck === error) {

                    $('#passError').css('display', 'flex');
                    $('#passError').text('Must be 8 characters or long');
                }
                if (passCheck === false) {
                    $('#passError').css('display', 'flex');
                    $('#passError').text('Password does not match');
                }
            }




        })



        //delete account

        $('#delete_acc_id').click(function() {
            $('.deleteWindow').css('display', 'flex');
            $('.dmsg').css('display', 'block');

        })
        $('#no').click(function() {
            $('.deleteWindow').css('display', 'none');
            $('.dmsg').css('display', 'none');

        })

        $('#yes').click(function() {
            $('.deleteWindow').css('display', 'none');
            $('.dmsg').css('display', 'none');

            var mail = $('#user_email').val();

            var dataSet = {
                email: mail,
            };

            $.ajax({

                type: 'POST',
                url: '../../server/deleteAcc.php', // Update with the correct path to your PHP file
                data: dataSet,
                success: function(response) {
                    window.location.href = './index.php';
                    //console.log(response);
                },
                error: function() {
                    alert('Error occurred. Please try again.');
                }

            });

        })




    })
</script>

</html>