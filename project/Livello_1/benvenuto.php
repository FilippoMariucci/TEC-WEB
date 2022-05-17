<?php session_start(); ?>
<?php
    if(isset($_SESSION['valid'])) {
        include("connection_1.php");
        $result = mysqli_query($mysqli, "SELECT * FROM utente2");
    ?>
        Welcome <?php echo $_SESSION['name'] ?>
