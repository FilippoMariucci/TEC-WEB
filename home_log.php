<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="css/Livello_1_style/home_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/check.js"></script>
</head>
<body>
  <nav>
    <label class="logo">Affittacamere</label>
    <ul id="nav">
      <li><a href="#" class="active">home</a></li>
      <li><a href="faq.html">faq</a></li>
      <li><a href="contattaci_log.html">contattaci</a></li>
      <li><a href="catalogo_log.php">catalogo</a></li>
      <li>
       <li><?php session_start(); ?>
        <?php
           if(isset($_SESSION['user_id']) && ($_SESSION['ruolo']) =='le') {
              include("db.php");
              $result = mysqli_query($connection, "SELECT * FROM user");
        ?>
        <a href="area_ris_2.php" style="padding:10px; color:orange"> Welcome <?php echo $_SESSION['username'] ?></a>
        <?php
          } else {
              include("db.php");
              $result = mysqli_query($connection, "SELECT * FROM user");
              ?>
              <a href="area_ris_3.html" style="padding:10px; color:orange"> Welcome <?php echo $_SESSION['username'] ?></a>
              <?php
          }
         ?></li>
      <li><a href="logout.php" class="fa fa-sign-out"></a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

  <header>
    <div class="mySlides">
      <img src="img/app1.jpg" alt="appartamento">
    </div>
    <div class="mySlides">
      <img src="img/app2.jpg" alt="appartamento">
    </div>
    <div class="mySlides">
      <img src="img/app3.jpg" alt="appartamento">
    </div>
  </header>
  <div class="description">
    <h1>CHI SIAMO?</h1>
    <p>Sei uno studente alla ricerca di un appartamento o un posto letto nella città in cui studi? Sei
    un locatore che vuole creare un annuncio per il proprio immobile? Allora questo è il posto giusto per te!
    Registrati o effettua il login al sito per usufruire di tutti i nostri servizi. Affittare un appartamento o
    trovarne uno non è mai stato così semplice, basta un click! Se hai qualche dubbio visita la sezione apposita
    dedicata alle FAQ e non esitare a contattarci, saremo lieti di rispondere a tutte le tue domande.</p>
  </div>


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

