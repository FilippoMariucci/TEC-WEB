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
include_once "header_2.php";
include_once "sidebar.php";


if (isset($_GET['room_mang'])){
    include_once "room_mang.php";
}

elseif (isset($_GET['reservation'])){
    include_once "reservation.php";
}
elseif (isset($_GET['reservation_lo'])){
    include_once "reservation_lo.php";
}

else{
    include_once "room_mang.php";
}

include_once "footer.php";


