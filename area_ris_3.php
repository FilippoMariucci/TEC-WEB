<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="css/Livello_2_style/area_ris_2_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="default/styles.css" rel="stylesheet" title="Style" />

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<?php
//This page displays the list of the forum's categories
include_once "db.php";
include_once "aggiungi_preferiti.php.";

?>
 <nav>
    <label class="logo">Affittacamere</label>
    <ul id="nav">
      <li><a href="home_log.php" >home</a></li>
      <li><a href="faq.php">faq</a></li>
      <li><a href="contattaci_log.php">contattaci</a></li>
      <li><a href="catalogo_log.php">catalogo</a></li>
      <li>
       <li>
        <a href="#" style="padding:10px; color:orange" class="active"> Welcome <?php echo $_SESSION['username'] ?></a></li>
      <li><a href="logout.php" class="fa fa-sign-out"></a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

  <header>

    <div class="container">

      <div class="area">
        <i class="fa fa-user"></i>
        <h1>Area Riservata</h1>
      </div>
      <?php
        if(isset($_SESSION['user_id']))
          {
         $nb_new_pm = mysqli_fetch_array(mysqli_query($connection,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['user_id'].'" and user1read="no") or (user2="'.$_SESSION['user_id'].'" and user2read="no")) and id2="1"'));
         $nb_new_pm = $nb_new_pm['nb_new_pm'];
      ?>

      <div class="bottoni">

        <div class="messaggi">
          <button>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <a href="list_pm.php" class="active"> <p>Visualizza i tuoi messaggi</p> <span class="badge"><font color="#ffcccc"><?php echo $nb_new_pm; ?></font></span></a>
          </button>
        </div>

        <?php
}
else
{
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Chat Index</a>
    </div>
    <div class="box_right">
    	<a href="signup.php">Sign Up</a>
    </div>
	<div class="clean"></div>
</div>
<?php
}
?>





        <div class="account">
          <button>
            <i class="fa fa-flag" aria-hidden="true"></i>
            <a href="preferiti.php" class="active"> <p>Visualizza le tue opzioni di alloggi</p></a>

          </button>
        </div>

        <div class="account">
          <button>
            <i class="fa fa-user" aria-hidden="true"></i>
            <a href="view.php" class="active"> <p>Visualizza e/o modifica il tuo account</p></a>
          </button>
        </div>

      </div>

    </div>

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
  </script>

</body>
</html>
