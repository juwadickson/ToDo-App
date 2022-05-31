<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/display.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css" />
  </head>
  <body>
    <?php 
      include('../server/dbConnect.php');
      session_start();
      $username = $_SESSION['username'];

      if(!isset($username)){
        header("Location: ../pages/login.php");
      }else{
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
  
        if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          $username = $row['username'];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $othername = $row['othername'];
  
          $fullname = $firstname." ".$lastname;
        }
      }
      
    ?>
    <div class="container" style="text-align: center">
    <header>
        <div class="header-icon">
          <i class="fa fa-bars" id="navBar" onClick="showHideNav()"></i>
          <span><i class="fa fa-book"></i>TodoList</span>
        </div>
        <menu>
          <span class="dropdownLink"id="dropdownLink" onClick="dropdown()">Hi, <?php echo $username;?>  <i class="fa fa-caret-down " id="down"></i><i class="fa fa-caret-up" id="up"></i></span>
          <a href="../server/logout.php" class="dropdown-content" id="dropdown-content">logout</a>
        </menu>
        <script src="../Js/app.js"></script>
      </header>
      <form action="../server/addToDo.php" method="post">
        <input type="text" name="todo" id="todo" placeholder="Enter Todo here" required>
        <input type="submit" value="Add" name="addTodo">
      </form>
      <?php 
        error_reporting(0);
        if($_GET['failureId']){
          echo '<p style="color:red" id="para">Todo Event Already Exist</p>';
        }elseif ($_GET['successId']) {
          echo '<p style="color:green" id="para">New Todo Added</p>';
        }elseif($_GET['delete']){
          echo '<p style="color:red" id="para">Todo Event Deleted Successfully</p>';
        }else{
          echo '';
        }
      ?>
      <!-- Script to Hide Response from database after 4 seconds -->
      <script>
          setTimeout(() => {
            const res = document.getElementById("para");
            res.style.visibility = "hidden";
          }, 4000);
      </script>
      <section>
        <div class="nav" id="nav">
          <a href="display.php">todoList (<?php include('../server/countTodoList.php'); ?>)</a>
          <a href="displayToDoChecked.php">checked Todo (<?php include('../server/countCheckedTodo.php'); ?>)</a>
          <a href="displayToDoUnchecked.php"  class="active">Unchecked Todo (<?php include('../server/countUncheckedTodo.php'); ?>)</a>
        </div>
        <div class="nav-content">
          <h3>TODO List</h3>
          <div class="events">
            <?php 
              $sql1 = "SELECT * FROM users WHERE username = '$username'";
              $result1 = mysqli_query($conn, $sql1);
              $row = mysqli_fetch_assoc($result1);
              $id = $row['id'];
              $event_id = $row['event_id'];

              $sql2 = "SELECT * FROM todolist WHERE user_id='$id' AND checked=0";
              $result2 = mysqli_query($conn, $sql2);
              while($rows = mysqli_fetch_assoc($result2)){
                $event = $rows['event'];
                $event_id = $rows['event_id'];
                echo '
                <div>'.$event.'<span><a href="../server/checkTodo.php?eventId='.$event_id.'"><i class="fa fa-check"></i></a><a href="../server/deleteTodo.php?eventId='.$event_id.'"><i class="fa fa-times"></i></a></span></div>
                ';
              }

            ?>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
