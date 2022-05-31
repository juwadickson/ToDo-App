<?php
    include('dbConnect.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../pages/display.php");
    }
    if(isset($_GET['eventId'])){
        $id = $_GET['eventId'];

        $sql = "UPDATE todolist SET checked = 1 WHERE event_id = '$id'";
        $sql_result = mysqli_query($conn, $sql);

        if($sql_result){
            header("Location: ../pages/display.php?checked='checked'");
        }
        else{
            echo 'Data failed to Checked'.mysqli_error($conn);
        }
    }


?>