<?php
    if (isset($_POST['submit'])) {
     if (isset($_POST['txtUsername']) && isset($_POST['txtPassword'])) {

        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "tecnologieweb";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $query = "SELECT * FROM utente WHERE username='$username' AND password='$password'";
  	        $results = mysqli_query($conn, $query);
  	           if (mysqli_num_rows($results) == 1) {
  	               $_SESSION['txtUsername'] = $username;
  	               $_SESSION['success'] = "You are now logged in";
  	               header('location: home_log.html');
  	                }else {
  		                echo "Wrong username/password combination";
  	                }

        }
    }
    else {
        echo "All field are required.";
        die();
    }
         }
         else{
             echo "Submit button is not set";
         }
?>
