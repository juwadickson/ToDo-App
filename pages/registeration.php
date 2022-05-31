<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registeration Page</title>
    <link rel="stylesheet" href="../css/app.css" />
    <link rel="stylesheet" href="../css/registeration.css" />
    
  </head>
  <body>
    <div class="container">
      
      <?php include("../server/server.php");?>
      <div class="form-header">
        <h3>Registeration</h3>
        <p>Provide your information in the form below to create a TodoList account</p>
      </div>
      <hr />
      <form action="" method="post" name="registeration">
        <div class="form-input">
          <label for="firstname">First Name:<b>*</b></label>
          <input
            type="text"
            name="firstname"
            id="fname"
            value="<?php if(isset($_POST['register'])){echo($_POST['firstname']);};?>"
            placeholder="Enter your first name"
            oninput="verifyFnameFormat()"
            required
          />
          <small class="display" id="firstNameFormat"></small>
        </div>
        <div class="form-input">
          <label for="lastname">Last Name:<b>*</b></label>
          <input
            type="text"
            name="lastname"
            id="lname"
            value="<?php if(isset($_POST['register'])){echo($_POST['lastname']);};?>"
            oninput="verifyLnameFormat()"
            placeholder="Enter your last name"
            required
          /><small class="display" id="lastNameFormat"></small>
        </div>
        <div class="form-input">
          <label for="othername">Other Name:</label>
          <input
            type="text"
            name="othername"
            id="oname"
            value="<?php if(isset($_POST['register'])){echo($_POST['othername']);};?>"
            oninput="verifyOnameFormat()"
            placeholder="Enter your other name"
          /><small class="display" id="otherNameFormat"></small>
        </div>
        <div class="form-input">
          <label for="email">Email:<b>*</b></label>
          <input
            type="email"
            name="email"
            id="email"
            value="<?php if(isset($_POST['register'])){echo($_POST['email']);};?>"
            placeholder="Enter your email"
            required
          /><small style="opacity:0.7;">example: abcd@gmail.com</small>
        </div>
        <div class="form-input">
          <label for="phone">Phone:<b>*</b></label>
          <input
            type="text"
            name="phone"
            id="phone"
            value="<?php if(isset($_POST['register'])){echo($_POST['phone']);};?>"
            placeholder="Enter your phone number"
            required
          /><small class="display" id="phoneFormat"></small>
        </div>
        <div class="form-input">
          <label for="username">Username:</label>
          <input
            type="text"
            name="username"
            value="<?php if(isset($_POST['register'])){echo($_POST['username']);};?>"
            id="username"
            placeholder="Enter your username"
            required
          /><small></small>
        </div>
        <div class="form-input">
          <label for="password1">Password:<b>*</b></label>
          <input
            type="password"
            name="password1"
            id="pwd1"
            placeholder="Enter your password"
            required
          /><small></small>
        </div>
        <div class="form-input">
          <label for="password2">Confirm Password:<b>*</b></label>
          <input
            type="password"
            name="password2"
            id="pwd2"
            placeholder="Confirm your Password"
            required
          /><small></small>
        </div>
        <input type="submit" name="register" value="Register" />
        <p style="text-align: center">
          Already a member? <a href="login.php">login</a>
        </p>
        <script>
          setTimeout(() => {
            const res = document.getElementById("error");
            res.style.display = "none";
          }, 5000);
        </script>
      
      </form>
      <script src="../Js/app.js"></script>
    </div>
  </body>
</html>
