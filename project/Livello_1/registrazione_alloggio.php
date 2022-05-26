<html>
<head>
    <title>Register</title>
</head>

<body>
    <a href="home_no_log.html">Home</a> <br />
    <?php
    include("connection_1.php");

    $statusMsg = '';

   // File upload path
    $targetDir = "../../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST['submit']) && !empty($_FILES["file"]["name"])) {
        $des = $_POST['descrizione'];
        $city = $_POST['citta'];
        $vi = $_POST['via'];
        $num = $_POST['numero_civico'];
        $dim = $_POST['dimensioni'];
        $num_posti = $_POST['num_posti_letto_tot'];
        $di = $_POST['data_inizio'];
        $df = $_POST['data_fine'];
        $vin = $_POST['vincoli'];
        $disp = $_POST['disponibilita'];
        $wf = $_POST['wi_fi'];
        $par = $_POST['parcheggio'];
        $cuc = $_POST['cucina'];
        $elett = $_POST['elettrodomestici'];

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){

         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


          if($des == "" || $city == "" || $vi == "" || $num == "" || $dim == "" || $num_posti == "" || $di == "" || $df == ""|| $vin == "" || $disp == "" || $wf == "" || $par == "" || $cuc == "" || $elett == "" ) {
            echo "All fields should be filled. Either one or many fields are empty.";
            echo "<br/>";
            echo "<a href='register_1.php'>Go back</a>";
          } else {
            mysqli_query($mysqli, "INSERT INTO alloggio(descrizione, citta, via, numero_civico, dimensioni, num_posti_letto_tot, data_inizio, data_fine, vincoli, disponibilita, wi_fi, parcheggio, cucina, elettrodomestici, file_name, uploaded_on) VALUES('$des', '$city', '$vi', '$num', '$dim', '$num_posti', '$di', '$df', '$vin', '$disp', '$wf', '$par', '$cuc', '$elett','".$fileName."', NOW())")
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
