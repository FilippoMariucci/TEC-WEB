<!DOCTYPE html>

<html lang="en">
<?php
include_once("db.php");
session_start();
?>

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

  <div class="static_container">
    <form action="" method="POST">


    <div class="statistic">
      <form action="" method="post">

      <p>Seleziona il periodo temporale su cui effettuare una statistica :<label>Da<input type="date" name="from_date" class="form-control"></label><label>A<input type="date" name="to_date" class="form-control"></label><button type="submit" name="date" class="btn btn-primary">Filter</button></p>
<p>Tot:

<?php
if(isset($_POST['from_date']) && isset($_POST['to_date']))
{
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $query = "SELECT COUNT (room_id) FROM room ";
  $result = $connection->query($query);
  $search_result = filterTable($query);
  while($row = $result ->fetch_array(MYSQLI_NUM)){
  ?><p><?php echo $row?></p>
 <?php
 }
  }?><?php
?> </p>

  </form>
    </div>

    <div class="statistic">


    </div>
    </form>

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

