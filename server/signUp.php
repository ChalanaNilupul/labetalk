<?php

include('./DB_Connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$num = $_POST['number'];

$sql = "SELECT * FROM `rusers` WHERE `Email`='" . $email . "'";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "Registered";

} else {

    $sql1 = "INSERT INTO `rusers` (`name`,`email`,`profilePicture`,`password`,`number`) VALUES ('" . $name . "','" . $email . "','../Uploads/PPic/default.png','" . $pass . "','" . $num . "');";

    if(mysqli_query($con, $sql1)){

        $mail = 'info@labetalk.com';
     

        $to         = $email;
        $mail_subject = 'labetaLK.com';
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
                    Welcome To labetaLK
                </div>
                <div class='in'>
                    You Registered Successfully! You Can Sell Your Foods Now.
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
            echo "success";
        } else {
          echo "Message Not Sent.";
        }

        
    }
    
}



?>