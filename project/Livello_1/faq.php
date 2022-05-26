<!DOCTYPE html>
<html lang="en" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:font-size="http://www.w3.org/1999/xhtml">
<head>
  <title>FAQ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../../css/Livello_1_style/faq_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- NAVBAR-->

  <nav>
    <label class="logo">Affittacamere</label>
    <ul id="nav">
      <li><a href="index.html">home</a></li>
      <li><a href="#" class="active">faq</a></li>
      <li><a href="contattaci_no_log.html">contattaci</a></li>
      <li><a href="catalogo_no_log.php">catalogo</a></li>
      <li><a href="registrazione.html">registrati</a></li>
      <li><a href="login.html">login</a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

<!-- HERO PAGE SECTION-->
<section id="initial_image">
<div class="container">
  <div id="page-hero" >
    <div class="home_section" >
      <img src="https://tonucci.com/wp-content/uploads/2018/05/Call-centre.jpg"
           alt="Assistenza">
      <div class="text_assistenza">
        <h1 style="font-size:40px;text-decoration-style: solid;">
          Assistenza e contatti</h1>
      </div>
    </div>
  </div>
</div>
</section>


<section id="faq-page">

  <div class="container_2">
    <div>
      <div>
        <h2 class="domande">Domande Frequenti</h2>
        <p>
          Hai una domanda? Qui puoi trovare risposte e soluzioni ai dubbi più comuni.</p>
        <p>&nbsp;</p>
        <p>
          Per chiedere altre informazioni o contattarci
          <a href="contattaci.html" class="faq__cta-link w3-text-#28698F">
            scrivici direttamente</a>.</p>
      </div>
    </div>


  </div>

 <?php session_start(); ?>

 <?php
//including the database connection file
include_once("connection_1.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM faq ");

?>

<?php
    while($res = mysqli_fetch_array($result)) {
?>

  <div class="container_faq">


        <div class="dropdown">


          <button onclick="myFunction('FAQ1')" class="dropbtn">
            <div class="testo" style=" padding-left: 50px;padding-right: 125px;">
              <strong><?php echo "<strong>".$res['domanda']."</strong>" ?></strong>
              <i class="fa fa-caret-down"></i>
            </div>
          </button>
          <div id="FAQ1" class="messi">
            <p><?php echo "<p>".$res['risposta']."</p>" ?></p>

          </div>
        </div>

      </div>

 <?php
}
?>


<section id="contact-section" >
  <div  class="contact_area" align="center">

    <h2 class="section-header__title raleway">Non hai trovato ciò che cercavi?</h2>
      <form action="contattaci.html">
    <button id="open-contact-form" class="contact_button">Clicca qui</button>
        </form>

  </div>

</section>


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
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>

</body>

</html>
