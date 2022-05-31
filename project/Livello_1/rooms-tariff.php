<?php include 'header.php';?>

<div class="container">

<h2>Rooms &amp; Tariff</h2>


<!-- form -->

<div class="row">
  <?php
    require_once('connection_1.php');
    $q = "SELECT * FROM alloggio ";
    $run = mysqli_query($mysqli, $q);
    $count = 0;
    if(mysqli_num_rows($run) > 0){
        while($row = mysqli_fetch_array($run)){
         $imageURL = '../../uploads/'.$row["file_name"];
  ?>
  <div class="col-sm-6 wowload fadeInUp">
      <div class="rooms">
          <img class="img-responsive" src="<?php echo $imageURL; ?>"/>
          <div class="info">
              <h3><?php echo $row['descrizione']; ?></h3>
              <p style="color: darkgreen;"> Size: <?php echo $row['dimensioni']; ?> sq. feet<br> Per Night: <?php echo $row['citta']; ?> Taka Only</p>
              <a href="room-details.php?id=<?php echo $row['id_alloggio']; ?>" class="btn btn-default">Check Details</a>
          </div>
      </div>
  </div>
  <?php
        }

    }
  ?>


</div>


</div>

