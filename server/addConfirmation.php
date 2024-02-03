<?php

include('./DB_Connect.php');


$id = $_POST['id'];
$cmail = $_POST['mail'];

$sql = "UPDATE `ads`
        SET `status`='active'
        WHERE `id` ='$id' ";

$result = mysqli_query($con, $sql);

if (mysqli_query($con, $sql)) {

    echo "success";

    $mail = 'info@labetalk.com';


    $to         = $cmail;
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
                    Your ad is live, now visitors can view your ad
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

} else {

    echo "error";
}


?>