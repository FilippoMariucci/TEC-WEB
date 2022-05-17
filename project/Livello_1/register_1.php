<html>
<head>
    <title>Register</title>
</head>

<body>
    <a href="index_1.php">Home</a> <br />
    <?php
    include("connection_1.php");

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $cogn = $_POST['cognome'];
        $date = $_POST['data'];
        $tel = $_POST['telefono'];
        $sex = $_POST['sesso'];
        $role = $_POST['ruolo'];


        if($user == "" || $pass == "" || $name == "" || $cogn == "" || $date == "" || $tel == "" || $sex == "" || $role == "") {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register_1.php'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO utente2(name, username, password, cognome, data, telefono, sesso, ruolo) VALUES('$name', '$user', '$pass', '$cogn', '$date', '$tel', '$sex', '$role')")
            or die("Could not execute the insert query.");

            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.html'>Login</a>";
        }
    } else {
?>

    <?php
    }
    ?>
</body>
</html>
