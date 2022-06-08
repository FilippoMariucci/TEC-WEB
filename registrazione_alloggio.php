<html>
<head>
    <title>Register</title>
</head>

<body>
    <a href="home_no_log.html">Home</a> <br />

    <?php
include_once "db.php";
session_start();
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result_2 = mysqli_query($connection, "SELECT * FROM user");
    $userName = $_SESSION['username'];
    $username = mysqli_fetch_assoc($result_2);
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:login.php');
}

    $statusMsg = '';

   // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST['submit']) && !empty($_FILES["file"]["name"])) {
        $room_type_id = $_POST['room_type_id'];
        $room_no = $_POST['room_no'];

        $des = $_POST['descrizione'];
        $city = $_POST['citta'];
        $vi = $_POST['via'];
        $num = $_POST['numero_civico'];
        $dim = $_POST['dimensioni'];
        $di = $_POST['data_inizio'];
        $df = $_POST['data_fine'];
        $vin = $_POST['vincoli'];
        $wf = $_POST['wi_fi'];
        $par = $_POST['parcheggio'];
        $cuc = $_POST['cucina'];
        $elett = $_POST['elettrodomestici'];

        $allowTypes = array('jpg','png','jpeg','gif','pdf');



        if(in_array($fileType, $allowTypes)){

         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


          if($des == "" || $city == "" || $vi == "" || $num == "" || $dim == "" || $di == "" || $df == ""|| $vin == "" ||  $wf == "" || $par == "" || $cuc == "" || $elett == "" ) {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register_1.php'>Go back</a>";
          } else {
            mysqli_query($connection, "INSERT INTO room (room_type_id,room_no, user_id, user_username, descrizione, citta, via, numero_civico, dimensioni,data_inizio, data_fine, vincoli, wi_fi, parcheggio, cucina, elettrodomestici, file_name, uploaded_on) VALUES('$room_type_id','$room_no', '$user_id','$userName', '$des', '$city', '$vi', '$num', '$dim',  '$di', '$df', '$vin',  '$wf', '$par', '$cuc', '$elett','".$fileName."', NOW())")
            or die("Could not execute the insert query.");

            echo "Registration successfully";
            echo "<br/>";
            echo "<a href='login.html'>Login</a>";

            }

        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }

        }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
    } else {
      $statusMsg = 'Please select a file to upload.';
?>

    <?php
    }

    ?>
</body>
</html>
