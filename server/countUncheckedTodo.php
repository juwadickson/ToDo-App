<?php
    include 'dbConnect.php';

    $sql = "SELECT * FROM todolist WHERE checked = 0 AND user_id ='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $count = mysqli_num_rows($result);
        echo $count;
    }


?>