<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>

<body>
<a href="index_1.php">Home</a> <br />
<?php
include("connection_1.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login_1.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM utente2 WHERE username='$user' AND password='$pass'")
        or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['ruolo'] = $row['ruolo'];

        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login_1.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])  ) {
            header('Location: home_log_le.php');
        } else{
            echo "error";
        }
    }
} else {
?>

<?php
}
?>
</body>
</html>
