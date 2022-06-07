<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>

<body>
<a href="index.html">Home</a> <br />
<?php
include("db.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($connection, $_POST['username']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.html'>Go back</a>";
    } else {
        $result = mysqli_query($connection, "SELECT * FROM user WHERE username='$user' AND password='$pass'")
        or die("Could not execute the select query.");

        $row = mysqli_fetch_assoc($result);

        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_id'] = $row['user_id'];
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
