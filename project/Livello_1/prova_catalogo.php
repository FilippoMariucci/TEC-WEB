
<?php session_start(); ?>

<?php
//including the database connection file
include_once("connection_1.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM alloggio ORDER BY id_alloggio DESC");

?>

<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="../../css/templatemo-style.css">
</head>

<body>
<a href="home_log.php">Home</a> | <a href="logout.php">Logout</a>
<br/><br/>

<?php
    while($res = mysqli_fetch_array($result)) {
    $imageURL = '../../uploads/'.$res["file_name"];
?>

    <div class="tm-recommended-place">

      <div class="tm-recommended-description-box">
        <img src="<?php echo $imageURL; ?>" style="padding:10%"/>
        <h3 class="tm-recommended-title"> <?php echo "<h3>".$res['descrizione']."</h3>" ?></h3>
        <p class="tm-text-highlight"><?php echo "<p>".$res['citta']."</p>" ?></p>
        <p class="tm-text-gray"> <?php echo "<p>".$res['via']."</p>" ?></p>
      </div>
      <a href="#" class="tm-recommended-price-box">
        <p class="tm-recommended-price"><?php echo "<p>".$res['numero_civico']."</p>" ?></p>
        <p class="tm-recommended-price-link"><?php echo "<p>".$res['dimensioni']."</p>" ?> </p>
      </a>

    </div>

    <?php


}
?>

</body>
</html>
