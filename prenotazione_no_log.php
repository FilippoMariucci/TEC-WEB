<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HOMEPAGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="css/Livello_1_style/home_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="catalogo_no_log.php">
</head>
<body>
  <nav>
    <label class="logo">Affittacamere per Studenti</label>
    <ul id="nav">
      <li><a href="#" class="active">home</a></li>
      <li><a href="faq.php">faq</a></li>
      <li><a href="contattaci_no_log.html">contattaci</a></li>
      <li><a href="catalogo_no_log.php">catalogo</a></li>
      <li><a href="registrazione.html">registrati</a></li>
      <li><a href="login.html">login</a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

  <?php
//including the database connection file
include_once("connection_1.php");
//fetching data in descending order (lastest entry first)
  echo $_COOKIE["test"];
 $result = mysqli_query($mysqli, "SELECT * FROM alloggio WHERE id_alloggio = '$COOKIE["test"]'");
?>



<?php
    while($res = mysqli_fetch_array($result)) {
    $imageURL = 'uploads/'.$res["file_name"];
?>

    <div class="container_home">

     <img class="img_home" src="<?php echo $imageURL; ?>"/>
      <div class="description">

        <h3 class="h3_home" <?php echo "<h3>".$res['descrizione']."</h3>" ?></h3>
        <p class="p_home"<?php echo "<p>".$res['id_alloggio']."</p>" ?></p>
        <p class="p_home"<?php echo "<p>".$res['citta']."</p>" ?></p>
        <p class="p_home" <?php echo "<p>".$res['via']."</p>" ?></p>
      </div>
      <a href="prenotazione_no_log.html" class="price_box">
        <p class="p_home_price" <?php echo "<p>".$res['numero_civico']."</p>" ?></p>
        <p class="p_home_price" <?php echo "<p>".$res['dimensioni']."</p>" ?> </p>
      </a>

    </div>

    <?php


}
?>

  <footer>
    <div class="describe">
      <p>Scarica la guida al sito</p>
      <a href="#" class="fa fa-download" aria-hidden="true" download></a>
    </div>
    <div class="creator">
      <h3>Powered By</h3>
      <p>Mariucci Filippo</p>
      <p>Olivieri Giorgio</p>
      <p>Palmieri Giovanni</p>
      <p>Sisi Mattia</p>
    </div>
  </footer>

  <script>
    function show_nav(){
      var x = document.getElementById("nav");
      if(x.style.left === "0%"){
        x.style.left = "-100%";
      }
      else{
        x.style.left = "0%";
      }
      }
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 4000);
    }
</script>

</body>
</html>
