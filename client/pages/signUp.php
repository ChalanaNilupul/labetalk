<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
        <div class="container_SignUp">
            <div class="head">
                <h1>Create An Account</h1>
            </div>
            <div class="error" id="error"></div>
            <form action method="POST">
                <div class="list">
                    <input required type="text" name="name" class="txtsignup name" placeholder="Full Name" required>
                    <input required type="text" name="email" class="txtsignup mail" placeholder="E-mail" required>
                    <input required type="text" name="contactNumber" class="txtsignup num" placeholder="Contact Number">
                    <input required type="password" name="password" class="txtsignup pass" placeholder="Create Password" required>
                    <input required type="password" name="confirmPassword" class="txtsignup conPass" placeholder="Confirm Password" required>
                </div>
                <div class="regbutton">
                    <button type="submit" class="regbtn"><span class="signup_regtxt">Register</span></button>
                </div>
            </form>
            <div class="alreadyaccess">
                <span class="hvacc"> Have an account ? <a href="./signIn.php"> Login </a>
                </span>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
    ?>

</body>

<script>
    $(document).ready(function() {
        function isValidEmail(email) {
            var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

            return pattern.test(email);
        }

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

        $('.regbtn').click(function(e) {

            e.preventDefault();


            var name = $('.name').val();
            var email = $('.mail').val();
            var number = $('.num').val();
            var pass = $('.pass').val();
            var conPass = $('.conPass').val();


            if (name === "" || email === "" || number === "" || pass === "" || conPass === "") {
                $('#error').addClass('active');
                $('#error').text("Fields Can't Be Empty");
                //console.log('empty')
            } else {

                var mailCheck = isValidEmail(email);
                var passCheck = isValidPass(pass, conPass);

                if (mailCheck === true && passCheck === true) {
                    $('#error').removeClass('active');

                    var dataSet = {
                        name: name,
                        email: email,
                        number: number,
                        pass: pass,
                    };

                    //console.log(dataSet)

                    $.ajax({

                        type: 'POST',
                        url: '../../server/signUp.php', // Update with the correct path to your PHP file
                        data: dataSet,
                        success: function(response) {
                            if (response === 'Registered') {
                                $('#error').addClass('active');
                                $('#error').text('Email is Already Registered');
                            }
                            if (response === 'success') {
                                window.location.href = './signIn.php';
                            }
                            //console.log(response)
                        },
                        error: function() {
                            alert('Error occurred. Please try again.');
                        }

                    });


                } else {

                    if (mailCheck === false) {
                        $('#error').addClass('active');
                        $('#error').text('Input a Valid Email');
                    }
                    if (passCheck === false) {
                        $('#error').addClass('active');
                        $('#error').text('Password Does Not Match');
                    }
                    if (passCheck === error) {
                        $('#error').addClass('active');
                        $('#error').text('Password Must Be 8 Or More Characters Long');
                    }


                }

            }



        });

    });
</script>

</html>