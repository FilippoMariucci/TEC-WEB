<?php
include_once "db.php";

session_start();
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:login.php');
}

if(isset($_GET['id'])){
        $id = $_GET['id'];
        $q = "SELECT * FROM room WHERE room.room_id = $id";
        $run = mysqli_query($connection, $q);
        $row = mysqli_fetch_array($run);
        $imageURL = 'uploads/'.$row["file_name"];
        $q_2 = "INSERT INTO preferiti(user_id,room_id) VALUES('$user_id', '$id')";
        mysqli_query($connection, $q_2);
            echo "Registration successfully";

 header( "refresh:2;url=catalogo_log.php" );

    }





?>
