<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav bar</title>
    <link rel="stylesheet" href="../css/navBar.css">
    <script src="../js/navBar.js"></script>
</head>
<body>
    <div class="navBar">
        <div class="img"><a href=""><img src="../resources/logo.png" alt=""></a></div>
        <div class="lan">
            <a href="">தமிழ் / </a>
            <a href="">සිං</a>
        </div>
        <div class="link">
            <ul>
                <li style="padding-top: 3px;"><a href="">Login</a></li>
                <li style="padding-top: 3px;"><a href="">About Us</a></li>
                <li style="padding-top: 3px;"><a href="">Contact</a></li>
                <li><button>Post</button></li>
            </ul>
        </div>

    </div>


    <!-- -------------------------------------------mobile responsive ---------------------------------------------------------->


    <div class="menubar" onclick="nav()" id="menubar">
        
    </div>
 
    <div class="postAdd" onclick="nav()">
Post Add
    </div>

    <div class="navBarMobile" id="navBarMobile">
       
        <div class="min" id="min">
            <div class="link">
                <ul>
                    <li style="padding-top: 3px;"><a href="">Login</a></li>
                    <li style="padding-top: 3px;"><a href="">Account</a></li>
                    <li style="padding-top: 3px;"><a href="">About Us</a></li>
                    <li style="padding-top: 3px;"><a href="">Contact</a></li>
                   
                    
                </ul>
            </div>
            <div class="lan">
                <a href="">தமிழ் / </a>
                <a href="">සිං</a>
            </div>
        </div>

    </div>



</body>
</html>