<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>

<body>
<a href="index.html">Home</a> <br />
<?php
include("connection_1.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.html'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' AND password='$pass'")
        or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['ruolo'] = $row['ruolo'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.html'>Go back</a>";
        }

        if(isset($_SESSION['valid']) && ($_SESSION['name'])== 'admin') {
            header('Location: ../Livello_4/area_ris_4.html');
         } else if(isset($_SESSION['valid'])){
             header('Location: home_log.php');
             }
      }
} else {
?>

<?php
}
?>
</body>
</html>
