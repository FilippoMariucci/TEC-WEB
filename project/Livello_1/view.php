<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.html');
}
?>

<?php
//including the database connection file
include_once("connection_1.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM utente2 WHERE id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
<br/><br/>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Username</td>
        <td>Password</td>
        <td>Cognome</td>
        <td>Data</td>
        <td>Telefono</td>
        <td>Sesso</td>
        <td>Ruolo</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['username']."</td>";
        echo "<td>".$res['password']."</td>";
        echo "<td>".$res['cognome']."</td>";
        echo "<td>".$res['data']."</td>";
        echo "<td>".$res['telefono']."</td>";
        echo "<td>".$res['sesso']."</td>";
        echo "<td>".$res['ruolo']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a></td>";
    }
    ?>
</table>
</body>
</html>
