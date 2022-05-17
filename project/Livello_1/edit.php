<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.html');
}
?>

<?php
// including the database connection file
include_once("connection_1.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $name = $_POST['name'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $cogn = $_POST['cognome'];
        $date = $_POST['data'];
        $tel = $_POST['telefono'];
        $sex = $_POST['sesso'];
        $role = $_POST['ruolo'];

    // checking empty fields
    if(empty($name) || empty($user) || empty($pass)|| empty($cogn) || empty($date)|| empty($tel) || empty($sex) || empty($role) ){
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }

        if(empty($user)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }

        if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        if(empty($cogn)) {
            echo "<font color='red'>Cognome field is empty.</font><br/>";
        }

        if(empty($date)) {
            echo "<font color='red'>Data field is empty.</font><br/>";
        }

        if(empty($tel)) {
            echo "<font color='red'>Telefono field is empty.</font><br/>";
        }
        if(empty($sex)) {
            echo "<font color='red'>Sesso field is empty.</font><br/>";
        }
        if(empty($role)) {
            echo "<font color='red'>Ruolo field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE utente2 SET name='$name', username='$user', password='$pass', cognome='$cogn', data='$date', telefono='$tel', sesso='$sex', ruolo='$role' WHERE id=$id");

        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM utente2 WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $user = $res['username'];
    $pass = $res['password'];
     $cogn = $res['cognome'];
    $date = $res['data'];
    $tel = $res['telefono'];
     $sex = $res['sesso'];
    $role = $res['ruolo'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $user;?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $pass;?>"></td>
            </tr>
            <tr>
                <td>Cognome</td>
                <td><input type="text" name="cognome" value="<?php echo $cogn;?>"></td>
            </tr>
            <tr>
                <td>Data</td>
                <td><input type="date" name="data" value="<?php echo $date;?>"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="telefono" value="<?php echo $tel;?>"></td>
            </tr>
            <tr>
                <td>Sesso</td>
                <td><input type="radio" name="sesso" value="<?php echo $sex;?>">Maschio</td>
                <td><input type="radio" name="sesso" value="<?php echo $sex;?>">Femmina</td>
                <td><input type="radio" name="sesso" value="<?php echo $sex;?>">Altro</td>
            </tr>
            <tr>
                <td>Ruolo</td>
                <<td><input type="radio" name="ruolo" value="<?php echo $role;?>">Locatore</td>
                <td><input type="radio" name="ruolo" value="<?php echo $role;?>">Locatario</td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
