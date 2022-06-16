<?php session_start(); ?>

<?php
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("db.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];

        $dom = $_POST['domanda'];
        $ris = $_POST['risposta'];


    // checking empty fields
    if(empty($dom) || empty($ris)  ){
        if(empty($dom)) {
            echo "<font color='red'>Domanda field is empty.</font><br/>";
        }

        if(empty($ris)) {
            echo "<font color='red'>Risposta field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $result = mysqli_query($connection, "UPDATE faq SET domanda='$dom', risposta='$ris' WHERE id_faq='$id'");
        //redirectig to the display page. In our case, it is view.php
        header("Location: view_faq.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM faq WHERE id_faq=$id");

while($res = mysqli_fetch_array($result))
{
    $dom = $res['domanda'];
    $ris = $res['risposta'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a> | <a href="logout.php">Logout</a>
    <br/><br/>

    <form name="form1" method="post" action="edit_faq.php">
        <table border="0">
            <tr>
                <td>Domanda</td>
                <td><input type="text" name="domanda" value="<?php echo $dom;?>"></td>
            </tr>
            <tr>
                <td>Risposta</td>
                <td><input type="text" name="risposta" value="<?php echo $ris;?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
