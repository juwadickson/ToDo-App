<?php
    include 'dbConnect.php';
    $sql = "SELECT * FROM todolist WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $count = mysqli_num_rows($result);
        echo $count;
    }


?>