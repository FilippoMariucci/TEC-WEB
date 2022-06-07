<!DOCTYPE html>
<html lang="en">
<head>
<?php
 ?>
  <meta charset="UTF-8">
  <title>CATALOGO</title>
  <link rel="stylesheet" type="text/css" href="css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/Livello_1_style/catalogo_no_log_style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style><?php include 'css/Livello_1_style/catalogo_no_log_style.css'; ?></style>
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

<header>
  <div class="filter">

  <form action="" method="GET">
    <div class="location">
      <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>

    <div class="tipologia">
      <input type="radio" name="tipo">
      <label>Appartamento</label><br>
      <input type="radio" name="tipo">
      <label>Posto Letto</label>
    </div>

    <button id="btn" onclick="myFunction('drop', 'btn'); bordo('drop', 'drop2')" class="dropbtn">
      <p>Periodo di Locazione</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop" class="tendina">
      <label>DA
        <input type="date">
      </label><br>
      <label>A
        <input type="date">
      </label>
    </div>

    <button id="btn2" onclick="myFunction('drop2', 'btn2'); bordo('drop', 'drop2')" class="dropbtn2">
      <p>Fascia di Prezzo</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop2" class="tendina2">
      <label>DA €
        <input type="number">
      </label><br>
      <label>A €
        <input type="number">
      </label>
    </div>

    <div class="send">
      <button class="fa fa-search" type="submit" name="submit"></button>
    </div>


  </div>

  <div class="giggi" style="margin-left: 50px; margin-right: 50px">

    <div class="tab-content clearfix" style="background: white;">


<?php
//including the database connection file
include_once("connection_1.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM alloggio ORDER BY id_alloggio DESC");

?>



<?php
    while($res = mysqli_fetch_array($result)) {
    $imageURL = 'uploads/'.$res['file_name'];
?>




      <div class="container_home">

     <img class="img-responsive" src="<?php echo $imageURL; ?>"/>
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

      </div>
    </div>

    <?php

}
?>



</header>

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






    <div class="send">
      <button class="fa fa-search" type="submit" name="submit"></button>
    </div>
