<?php

session_start();

 if (!isset($_SESSION["adminEmail"])) {
     header("LOCATION:./signInAdmin.php");
 }

include('../../server/DB_Connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class='msgBox'>  </div>
    <div class="main">
        <div class="menu">
            <button id="dash">Dashboard</button>
            <button id="ads">Ads</button>


            <button id="logOut">Log Out</button>
        </div>
        <div class="content">
            <div class="dash">
                <div class="dashIn">
                    <div class="box">

                        <?php

                            $sql = "SELECT COUNT(*) AS 'row_count'
                            FROM `rusers` ";

                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_assoc($result);

                            echo"
                            <div class='bIn'>
                                <div>
                                    <h1>".$row['row_count']."</h1>
                                    <b><p>Registered Users</p></b>
                                </div>
                            </div>
                            
                            ";



                            $sqlp = "SELECT COUNT(*) AS 'pcount'
                            FROM `ads` 
                            WHERE `status` = 'pending'";

                            $resultp = mysqli_query($con, $sqlp);
                            $rowp = mysqli_fetch_assoc($resultp);

                            echo"
                            <div class='bIn'>
                                <div>
                                    <h1>".$rowp['pcount']."</h1>
                                    <b><p>Pending Ads</p></b>
                                </div>
                            </div>
                            
                            ";


                            $sqla = "SELECT COUNT(*) AS 'acount'
                            FROM `ads` 
                            WHERE `status` = 'active'";

                            $resulta = mysqli_query($con, $sqla);
                            $rowa = mysqli_fetch_assoc($resulta);

                            echo"
                            <div class='bIn'>
                                <div>
                                    <h1>".$rowa['acount']."</h1>
                                    <b><p>Active Ads</p></b>
                                </div>
                            </div>
                            
                            ";

                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="ads">
                <div class="adsIn">
                    <table border="1">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Place</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Action</th>


                        <?php

                                $sql = "SELECT * FROM `ads` WHERE `status`='pending' ";

                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo"

                                        <tr>
                                            <td id='adId'>".$row["id"]."</td>
                                            <td>".$row["title"]."</td>
                                            <td>".$row["place"]."</td>
                                            <td>".$row["price"]."</td>
                                            <td>".$row["description"]."</td>
                                            <td >
                                                <div id='imgSec'>
                                                    <img src='".$row["img1"]."' alt=''><br>
                                                    <img src='".$row["img2"]."' alt=''><br>
                                                    <img src='".$row["img3"]."' alt=''><br>
                                                    <img src='".$row["img4"]."' alt=''><br>
                                                    <img src='".$row["img5"]."' alt=''><br>
                                                </div>
                                                
                
                                            </td>
                                            <td><button id='".$row["id"]."' class='active'>Active</button></td>
                                        </tr>
                                        
                                        ";

                                        

                                    }
                                }


                        ?>


                       


                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#dash').click(function(e) {
                $('.dash').css('display', 'flex');
                $('.ads').css('display', 'none');

            })
            $('#ads').click(function(e) {
                $('.dash').css('display', 'none');
                $('.ads').css('display', 'flex');

            })

            $('#logOut').click(function(e) {
                window.location.href = '../../server/adminSignOut.php';
            })



            $('.active').click(function(){

                var id = $(this).attr('id');

                console.log(id)

                var dataSet = {
                    id: id
                };

                //console.log(dataSet);

                $.ajax({

                    type: 'POST',
                    url: '../../server/addConfirmation.php', // Update with the correct path to your PHP file
                    data: dataSet,
                    success: function(response) {

                        if(response === 'success'){
                            $('.msgBox').html("<div class='msg'>Successfully Send The Message</div>")
                        }
                        console.log(response)

                    },
                    error: function() {
                        alert('Error occurred. Please try again.');
                    }

                });
            })




        })
    </script>
</body>

</html>