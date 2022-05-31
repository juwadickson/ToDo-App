<?php
    include('dbConnect.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../pages/display.php");
    }
    if(isset($_GET['eventId'])){
        $id = $_GET['eventId'];

        $sql = "DELETE FROM todolist WHERE event_id = '$id'";
        $sql_result = mysqli_query($conn, $sql);

        if($sql_result){
            header("Location: ../pages/display.php?delete='delete'");
        }
        else{
            echo 'Data failed to Delete'.mysqli_error($conn);
        }
    }


?>