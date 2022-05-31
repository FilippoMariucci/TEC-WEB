<!DOCTYPE html>
<html lang="en">
<head>
<?php
 ?>
  <meta charset="UTF-8">
  <title>CATALOGO</title>
  <link rel="stylesheet" type="text/css" href="../../css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../../css/Livello_1_style/catalogo_no_log_style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style><?php include '../../css/Livello_1_style/catalogo_no_log_style.css'; ?></style>
</head>
<body>

  <!--NAVBAR-->
  <nav>
    <label class="logo">Affittacamere per Studenti</label>
    <ul id="nav">
      <li><a href="index.html">home</a></li>
      <li><a href="faq.php">faq</a></li>
      <li><a href="contattaci_no_log.html">contattaci</a></li>
      <li><a href="#" class="active">catalogo</a></li>
      <li><a href="registrazione.html">registrati</a></li>
      <li><a href="login.html">login</a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

  <?php





?>



<body>
<?php
//including the database connection file
include_once("connection_1.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM alloggio ORDER BY id_alloggio DESC");






    while($res = mysqli_fetch_array($result)) {
    $imageURL = '../../uploads/'.$res["file_name"];

?>

   <div class="container_home">

    <div onclick="window.location.href='sproduct.html';" class="product col-lg-3 col-md-4 col-12 text-center">
     <img class="img_home" src="<?php echo $imageURL; ?>"/>
      <div class="description">

        <h3 class="h3_home" <?php echo "<h3>".$res['descrizione']."</h3>" ?></h3>
        <p class="p_home"<?php echo "<p>".$res['id_alloggio']."</p>" ?></p>
        <p class="p_home"<?php echo "<p>".$res['citta']."</p>" ?></p>
        <p class="p_home" <?php echo "<p>".$res['via']."</p>" ?></p>
      </div>
      <div class="price_box">
        <p class="p_home_price" <?php echo "<p>".$res['numero_civico']."</p>" ?></p>
        <p class="p_home_price" <?php echo "<p>".$res['dimensioni']."</p>" ?> </p>
      </div>

      <div class="view">
        <button onclick="open_alloggio('<?php echo $res['id_alloggio'] ?>')">Visualizza</button>
      </div>
      </div>
    </div>

    <?php


}
?>
</body>




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

  <!--SCRIPT-->
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
    function myFunction(id1, id2) {
      var x = document.getElementById(id1);
      var y = document.getElementById(id2);
      if (x.style.display === "none") {
        x.style.display = "block";
        y.style.borderBottom = "none"
      } else {
        x.style.display = "none";
        y.style.borderBottom = "1px solid #34495e"
      }
    }
    function bordo(id1, id2){
      var x = document.getElementById(id1);
      var y = document.getElementById(id2);
      if((x.style.display === "block") && (y.style.display === "block")){
        y.style.borderLeft = "none"
      } else{
        y.style.borderLeft = "1px solid #34495e"
      }
    }




  </script>

</body>
</html>
