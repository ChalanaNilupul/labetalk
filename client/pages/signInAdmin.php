<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        h1 {
            margin-bottom: 20px;
        }

        .div {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            width: 50%;
            padding: 20px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 5.8px 0px rgba(0, 0, 0, 0.25);
        }

        .signIn {

            width: 100%;

            text-align: center;
        }

        .signIn input[type="text"],
        input[type="password"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px 10px;
        }

        .signIn button {
            width: 100%;
            padding: 10px;
            background-color: rgb(255, 208, 0);
            border: 0px;
            cursor: pointer;
            margin-top: 10px;
            color: white;
        }
        .error{
            width: 100%;
            padding: 10px;
            background-color: red;
            margin-bottom: 10px;
            padding: 5px 10px;
            display: none;
            color: white;
            text-align: center;
        }
        .error.active{
            display: flex;
        }
    </style>


</head>

<body>


    <div class="div">
        <div class="form">
            <div class="container_SignUp signIn">
                <div class="head">
                    <h1>Admin Login</h1>
                </div>
                <div class="error" id="error">

                </div>
                <div class="list">
                    <input type="text" name="email" class="txtsignup email" placeholder="E-mail">
                    <input type="password" name="password" class="txtsignup pass" placeholder="Password">
                </div>
                <div class="regbutton">
                    <button type="submit" class="regbtn"><span class="signup_regtxt">Login</span></button>
                </div>
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
                            url: '../../server/signInAdmin.php', // Update with the correct path to your PHP file
                            data: dataSet,
                            success: function(response) {

                                console.log(response);
                                
                                if (response.trim()  === 'success') {
                                    console.log("sdsd")
                                    window.location.href = './admin.php';
                                    
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



</body>

</html>