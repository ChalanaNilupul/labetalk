<?php

    include('./DB_Connect.php');

    $id = $_POST['id'];
    $start = ($id*9) - 9;

    $sql = "SELECT * FROM `ads` WHERE `status`='active' LIMIT $start,9";

    $sqlCount = "SELECT * FROM `ads` WHERE `status`='active'";

    $result = mysqli_query($con, $sql);

    $resultCount = mysqli_query($con, $sqlCount);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            echo "
                
                <a href='./adDetail.php?id=" . $row["id"] . " ''>
                    <div class='card'>
                        <div class='imgAd'>
                            <img src='" . $row["img1"] . "' alt>
                        </div>
                        <h3>" . $row["title"] . "</h3>
                        <div class='info'>
                            <h4>" . $row["price"] . "</h4>
                            <div>
                                <ul>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <ul> 
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        <p>" . $row["category"] . "</p>
                    </div>
                </a>
                
                
                
                ";
        }

        echo " <div class='results'>
        <input type='text' name='' id='search' class='txtSearch'>
        <button class='btnSearch'> Search </button>
               </div>   ";

       
        $btns = mysqli_num_rows($resultCount)/9;
        $j= ceil($btns);

        echo "<div class='pagination'>";
        for($i = 1; $i <= $j; $i++){
            echo "<button id='$i' class='paginationBtn'>$i</button>";
        }
        echo "</div>";
    }


?>
