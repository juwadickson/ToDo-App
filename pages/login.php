<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
    <link rel="stylesheet" href="../css/app.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.css" />
  </head>
  <body>
    <form action="" method="post">
      <?php include('../server/server.php'); ?>
      <div class="form-header">
        <i class="fa fa-book"></i>
        <h2>login</h2>
        <!-- <p style="color:green" id="successp">
          <?php 
            if($_GET['successId']){
              echo 'registeraion successfull';
            }else{
              echo "";
            }
          ?>
        </p> -->
      </div>
      <div class="form-input">
        <i class="fa fa-user"></i>
        <input
          type="text"
          name="username"
          id="username"
          placeholder="username"
          value="<?php if(isset($_POST['login'])){echo($_POST['username']);} ?>"
          required
        />
      </div>
      <div class="form-input">
        <i class="fa fa-key"></i>
        <input
          type="password"
          name="password"
          id="paswword"
          placeholder="*******************"
          required
        />
      </div>
      <input type="submit" name="login" value="login" />
      <p><a href="#">Forgot password?</a> <b>or</b> <a href="registeration.php">Register</a></p>
      <p>return to <a href="../index.html">home</a></p>
      <script>
          setTimeout(() => {
            const res = document.getElementById("error");
            res.style.display = "none";
          }, 4000);

          setTimeout(() => {
            const suc = document.getElementById("successp");
            suc.innerHTML = "";
          }, 4000);
      </script>
    </form>
      
  </body>
</html>
