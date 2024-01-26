<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
    <link rel="stylesheet" href="../css/style copy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/8fe8067efd.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    include_once 'navBar.php';
    ?>


    <div class="about_header">
        <div class="about_text_field">
            <div class="about_text">Contact Us</div>
        </div>
    </div>

    <div class="container">
        <form id="contactForm" action="#" method="post">
            <div class="container_fields">
                <div class="container_name">
                    <input type="text" class="textbox" name="firstname" placeholder="First Name" required>
                    <input type="text" class="textbox" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="container_email">
                    <input type="email" class="textbox" name="email" placeholder="E-mail" required>
                </div>
                <div class="container_message">
                    <textarea required="required" id="txtmsg" class="textbox" name="message" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="container_button">
                <button type="submit" name='submit'>Submit</button>
            </div>
        </form>
    </div>


    <?php

    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mail = $_POST['email'];
        $message = $_POST['message'];
        
        $labetalkmail = 'info@labetalk.com';

        $to         = 'info@labetalk.com';
        $mail_subject = 'labetalk.com';
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
                                Contact From labetalk.com
                            </div>
                            <div class='in'>
                                First Name :  $firstname <br>
                                Last Name :  $lastname <br>
                                Email :  $mail <br>
                                Message :  $message <br>
                            </div>
                            <div class='in' style='margin-top: 0;font-size:19px'>
                                
                            </div>
                    </div>

                </div>
            </body>
            </html>
        
        
        ";


        $header       = "From: {$labetalkmail}\r\nContent-Type: text/html;";

        $send_mail_result = mail($to, $mail_subject, $email_body, $header);

        if ($send_mail_result) {
            echo "<div class='msg'>Successfully Send The Message</div>";
        } else {
            echo "Message Not Sent.";
        }
    }


    ?>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>