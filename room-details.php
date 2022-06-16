<?php include 'header.php';?>

<?php
    require_once('db.php');

    if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:login.php');
}

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $q = "SELECT * FROM room WHERE room.room_id = $id";
        $run = mysqli_query($connection, $q);
        $row = mysqli_fetch_array($run);
        $imageURL = 'uploads/'.$row["file_name"];
        $imageURL2 = 'uploads/'.$row["img2"];
        $imageURL3 = 'uploads/'.$row["img3"];
        $imageURL4 = 'uploads/'.$row["img4"];
    }


?>
<head>
  <meta charset="UTF-8">
  <title>HOMEPAGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="css/Livello_1_style/home_style.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
<h1 class="title"><?php echo $row['citta']; ?></h1>
 <!-- RoomDetails -->
 <header>
 <div class="mySlides">
      <img class="img-responsive" alt="appartamento" src="<?php echo $imageURL;?>"/>
    </div>
    <div class="mySlides">
      <img class="img-responsive" alt="appartamento" src="<?php echo $imageURL2;?>"/>
    </div>
    <div class="mySlides">
      <img class="img-responsive" alt="appartamento" src="<?php echo $imageURL3;?>"/>
    </div>
    <div class="mySlides">
      <img class="img-responsive" alt="appartamento" src="<?php echo $imageURL4;?>"/>
    </div>
</header>
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


<div class="room-features spacer">
  <div class="row">
    <div class="col-sm-12 col-md-5">
    <p><?php echo $row['descrizione']; ?></p>
    </div>
    <div class="col-sm-6 col-md-3 amenitites">
    <h3>More Details:</h3>
    <ul>
      <li><p> Via: <?php echo $row['via']; ?></p></li>
      <li><p> Numero Civico: <?php echo $row['numero_civico']; ?></p></li>
      Disponibile
      <li><p> Da: <?php echo $row['data_inizio']; ?></p></li>
      <li><p> A: <?php echo $row['data_fine']; ?></p></li>
      <li><p>Vincoli: <?php echo $row['vincoli']; ?></p></li>
      <li><p> WI-FI: <?php echo $row['wi_fi']; ?></p></li>
      <li><p> Parcheggio: <?php echo $row['parcheggio']; ?></p></li>
      <li><p> Cucina: <?php echo $row['cucina']; ?></p></li>
      <li><p> Elettrodomestici:<?php echo $row['elettrodomestici']; ?></p></li>

      <li><p>Proprietario: <?php echo $row['user_username']; ?></p></li>
    </ul>




    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Size<span><?php echo $row['dimensioni']; ?> m^2</span></div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Price<span><?php echo $row['prezzo']; ?> € </span></div>
    </div>
  </div>
</div>

<?php
                        $room_query = "SELECT * FROM room NATURAL JOIN room_type WHERE deleteStatus = 0 AND room_id='$id'";
                        $rooms_result = mysqli_query($connection, $room_query);
                        if (mysqli_num_rows($rooms_result) > 0) {
                            while ($rooms = mysqli_fetch_assoc($rooms_result)) { ?>
                                <tr>
                                    <td><?php echo $rooms['room_no'] ?></td>
                                    <td><?php echo $rooms['room_type'] ?></td>
                                    <td>
                                        <?php
                                        if ($rooms['status'] == 0) {
                                            echo '<a href="index.php?reservation_lo&room_id=' . $rooms['room_id'] . '&room_type_id=' . $rooms['room_type_id'] . '" class="btn btn-success" style="border-radius:0%">Book Room</a>';
                                        } else {
                                            echo '<a href="#" class="btn btn-danger" style="border-radius:0%">Booked</a>';
                                        }
                                        ?>



                                </tr>
                            <?php }
                        } else {
                            echo "No Rooms";
                        }
                        ?>


<a href="signup.php">Contatta:  <?php echo $_SESSION['username'] ?></a>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
