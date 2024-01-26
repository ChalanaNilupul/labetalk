<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="icon" href="../resources/labeta-01.ico"
            type="image/ico">
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

<?php
    include_once 'navBar.php';
    ?>

    <div class="form">
        <div class="container_SignUp signIn">
            <div class="head">
                <h1>User Login</h1>
            </div>
            <div class="error" id="error">

            </div>
            <div class="list">
                <input type="text" name="email" class="txtsignup email" placeholder="E-mail" >
                <input type="password" name="password" class="txtsignup pass" placeholder="Password" >
            </div>
            <!-- <div class="fgtpswd">
                <span class="fgtpswd_txt"><a href="#" target="new"> Forgot Password? </a></span>
            </div> -->
            <div class="regbutton">
                <button type="submit" class="regbtn"><span class="signup_regtxt">Login</span></button>
            </div>
            <div class="alreadyaccess">
                <span class="hvacc"> Don't have an account ? <a href="./signUp.php"> Register </a> </span>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            function isValidEmail(email) {
                var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

                return pattern.test(email);
            }



            $('.regbtn').click(function(e) {

                e.preventDefault();

                var email = $('.email').val();
                var pass = $('.pass').val();


                if (email === "" || pass === "") {
                    $('#error').addClass('active');
                    $('#error').text("Fields Can't Be Empty");
                } else {
                    if (isValidEmail(email)) {
                        $('#error').removeClass('active');

                        var dataSet = {
                            email: email,
                            pass: pass,
                        };

                        $.ajax({
                           
                            type: 'POST',
                            url: '../../server/signIn.php', // Update with the correct path to your PHP file
                            data: dataSet,
                            success: function(response) {

                                console.log(response);
                                
                                if (response.trim()  === 'success') {
                                    window.location.href = './index.php';
                                }
                                if (response.trim()  === 'fail') {
                                    $('#error').addClass('active');
                                    $('#error').text('Email And Password Does Not Match');
                                }
                            },
                            error: function() {
                                alert('Error occurred. Please try again.');
                            }

                        });

                    } else {
                        $('#error').addClass('active');
                        $('#error').text('Input a Valid Email');
                    }
                }

            });

        })
    </script>

<?php
    include_once 'footer.php';
    ?>

</body>

</html>