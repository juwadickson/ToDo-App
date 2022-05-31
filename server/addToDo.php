<?php

    include("dBconnect.php");
    session_start();
    $username = $_SESSION['username'];

    if(!isset($username)){
        header("Location: ../pages/login.php");
    }
    else{
        $todo = "";

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        if(isset($_POST['addTodo'])){
            $todo = $_POST['todo'];
            $date_created = date("Y/m/d");
            $checked = 0; // 0 represent unchecked

            $sql = "SELECT * FROM todolist WHERE event = '$todo'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                header("Location: ../pages/display.php?failureId='failed'");
            }else{
                $sql = "INSERT INTO todoList(user_id,event,created_date,checked) VALUES('$id','$todo','$date_created','$checked')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $_SESSION['addToDoSuccess'] = "New Todo Added";
                    header("Location: ../pages/display.php?successId='success'");
                }else{
                    header("Location: ../pages/display.php");
                }
            }
            
        }
    }

?>