<?php   

    error_reporting(0); 
    include("dbConnect.php");
    session_start();

    // Declare all variables
    $firstname = $lastname = $othername = $email = $phone = $username = $password1 = $password2 = "";

    // Treat Input Data
    function treatInput($conn,$input){
        $input = stripslashes($input);
        $input = mysqli_real_escape_string($conn,$input);
        return $input;
    }


    if(isset($_POST['register'])){
        $firstname = treatInput($conn, $_POST['firstname']);
        $lastname = treatInput($conn, $_POST['lastname']);
        $othername = treatInput($conn, $_POST['othername']);
        $email = treatInput($conn, $_POST['email']);
        $phone = treatInput($conn, $_POST['phone']);
        $username = treatInput($conn, $_POST['username']);
        $password2 = treatInput($conn, $_POST['password2']);
        $password1 = treatInput($conn, $_POST['password1']);

        
        // Converting First letter of user Name to Uppercase
        $firstname = ucfirst($firstname);
        $lastname = ucfirst($lastname);
        $othername = ucfirst($othername);

        // Check if Password Match
        if($password1 != $password2){
            echo '<div class="response" id="error">Password does not Match</div>';
        }else{
            // Check if Matric Number alreeady exist
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                echo '<div class="response" id="error">username '.$username.' already exist</div>';
            }
            else{
                $pwd = md5($password1); // Encrypt the password

                $sql2 = "INSERT INTO users(firstname,lastname,othername,email,phone,username,password) VALUES('$firstname','$lastname','$othername','$email','$phone','$username','$pwd')";
                $result2 = mysqli_query($conn, $sql2);

                if($result2){
                    header("Location: ../pages/login.php?successId=true");
                }else{
                    echo '<div class="response" id="error">Data failed to upload</div>';
                }
            }
        }
    }


    if(isset($_POST['login'])){
        $username = treatInput($conn, $_POST['username']);
        $password = md5(treatInput($conn, $_POST['password']));
    
    
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = "Logged in successfull";
            header("Location: ../pages/display.php"); 
        }
        else{
          echo '<div class="response" id="error">Incorrect Username/Password</div>'; 
        }
      }

?>