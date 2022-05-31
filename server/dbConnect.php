<?php 

    define("LOCALHOST","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DATABASE_NAME","tododb");

    $conn = mysqli_connect(LOCALHOST, USERNAME,PASSWORD,DATABASE_NAME) or die("Error connecting to database");

    
?>