<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/style copy.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/8fe8067efd.js"
            crossorigin="anonymous"></script>
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
                <button type="submit">Submit</button>
            </div>
        </form>
        </div>


        <script>
           
        </script>

<?php
    include_once 'footer.php';
    ?>

    </body>
</html>