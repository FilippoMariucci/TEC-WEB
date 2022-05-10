<?php
    if (isset($_POST['submit'])) {
     if (isset($_POST['txtUsername']) && isset($_POST['txtPassword']) &&
        isset($_POST['txtNome']) && isset($_POST['txtCognome']) &&
        isset($_POST['date']) && isset($_POST['txtTelefono']) &&
        isset($_POST['gender']) && isset($_POST['ruolo']) ) {

        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $nome = $_POST['txtNome'];
        $cognome = $_POST['txtCognome'];
        $data = $_POST['date'];
        $telefono = $_POST['txtTelefono'];
        $sesso = $_POST['gender'];
        $ruolo = $_POST['ruolo'];



        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "tecnologieweb";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {

            $Insert = "INSERT INTO utente (username, password, nome, cognome, data_di_nascita, telefono, sesso, Ruolo) values(?, ?, ?, ?, ?, ?, ?, ?)";



                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssssiss",$username,$password,$nome,$cognome,$data,$telefono,$sesso,$ruolo );
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }


            $stmt->close();
            $conn->close();
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

