<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>REGISTRAZIONE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/nav_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" type="text/css" href="css/Livello_1_style/registrazione_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <!-- NAVBAR-->

  <nav>
    <label class="logo">Affittacamere per Studenti</label>
    <ul id="nav">
      <li><a href="index.html">home</a></li>
      <li><a href="faq.php">faq</a></li>
      <li><a href="contattaci_no_log.html">contattaci</a></li>
      <li><a href="catalogo_no_log.php">catalogo</a></li>
      <li><a href="#" class="active">registrati</a></li>
      <li><a href="login.html">login</a></li>
    </ul>
    <label id="icon">
      <i class="fa fa-bars" aria-hidden="true" onclick="show_nav()"></i>
    </label>
  </nav>

  <header>



<?php
include_once "db.php";
session_start();
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:login.php');
}
?>
    <!-- SIGN UP-->

    <div class="wrapper">
      <div class="title">
        Sign Up
      </div>

      <form action="registrazione_alloggio.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Room Type</label>
                                    <select class="form-control" name="room_type_id" id="room_type_id" required
                                            data-error="Select Room Type">
                                        <option selected disabled>Select Room Type</option>
                                        <?php
                                        $query = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($room_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $room_type['room_type_id'] . '">' . $room_type['room_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="field">
          <input type="text" name="room_no"  required>
          <label>Room No</label>
        </div>


                                <div class="field">
          <input type="text" name="descrizione"  required>
          <label>Room No</label>
        </div>


        <!-- descrizione  -->
        <div class="field">
          <input type="text" name="descrizione"  required>
          <label>Descrizione</label>
        </div>

        <!-- città  -->
        <div class="field">
          <input type="text" name="citta"  required>
          <label>Città</label>
        </div>

        <!-- via  -->
        <div class="field">
          <input type="text" name="via"  required>
          <label>Via</label>
        </div>



        <!-- numero civico  -->
        <div class="field">
          <input type="text" name="numero_civico"  required>
          <label>Numero Civico</label>
        </div>

        <!-- dimensioni -->

        <div class="field">
          <input type="text" name="dimensioni"  required>
          <label>Dimensioni</label>
        </div>

        <!-- numeri posti letto -->
        <div class="field">
          <input type="text" name="num_posti_letto_tot"  required>
          <label>Numeri Posti Letto</label>
        </div>

        <!-- data inizio -->
        <div class="field">
          <p>Data di Inizio:</p>
          <input type="date" name="data_inizio"  required>
        </div>

        <!-- data fine -->
        <div class="field">
          <p>Data di Fine:</p>
          <input type="date" name="data_fine"  required>
        </div>

        <!-- vincoli -->
        <div class="field">
          <input type="text" name="vincoli"  required>
          <label>Vincoli</label>
        </div>

        <!-- disponibilità -->
        <div class="field">
          <input type="text" name="disponibilita"  required>
          <label>Disponibilità</label>
        </div>

        <!-- wi-fi -->
        <div class="field">
          <input type="text" name="wi_fi"  required>
          <label>WI-FI</label>
        </div>

        <!-- parcheggio -->
        <div class="field">
          <input type="text" name="parcheggio"  required>
          <label>Parcheggio</label>
        </div>

        <!-- cucina -->
        <div class="field">
          <input type="text" name="cucina"  required>
          <label>Cucina</label>
        </div>

        <!-- elettrodomestici -->
        <div class="field">
          <input type="text" name="elettrodomestici"  required>
          <label>Elettrodomestici</label>
        </div>


    Select Image File to Upload:
    <input type="file" name="file">



        <div class="field">
          <input type="submit" value="Submit" name="submit">
        </div>
        <div class="signup-link">
          Sei già registrato? <a href="login.html"> &nbsp Sign in now</a>
        </div>
      </form>




    </div>
  </header>

  <!-- FOOTER-->

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
    var state= false;
    function toggle(){
      if (state){
        document.getElementById("password").setAttribute("type", "password");
        state= false;
        document.getElementById("eye").style.color= '#7a797e';
      }
      else {
        document.getElementById("password").setAttribute("type", "text");
        state= true;
        document.getElementById("eye").style.color= '#5887ef';
      }
    }
  </script>

</body>
</html>