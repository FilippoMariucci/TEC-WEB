<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="header">
        Welcome to my page!
    </div>
    <?php
    if(isset($_SESSION['valid'])) {
        include("connection_1.php");
        $result = mysqli_query($mysqli, "SELECT * FROM utente2");
    ?>
        Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a href='view.php'>View and Add Products</a>
        <br/><br/>
    <?php
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.html'>Login</a> | <a href='registrazione.html'>Register</a>";
    }
    ?>
    <div id="footer">
        Created by <a href="http://blog.chapagain.com.np" title="Mukesh Chapagain">Mukesh Chapagain</a>
    </div>
</body>
</html>
