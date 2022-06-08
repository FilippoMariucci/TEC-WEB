<?php include 'header.php';?>

<?php
    require_once('db.php');
    session_start();
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
    }


?>
<div class="container">
<h1 class="title"><?php echo $row['descrizione']; ?></h1>
 <!-- RoomDetails -->
            <div id="RoomDetails" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <div class="item active"><img class="img-responsive" alt="slide" src="<?php echo $imageURL; ?>"/></div>
                <!-- <div class="item  height-full"><img src="images/photos/<?php echo $row['image2']; ?>"  class="img-responsive" alt="slide"></div>  -->
                <!-- <div class="item  height-full"><img src="images/photos/<?php echo $row['image3']; ?>"  class="img-responsive" alt="slide"></div>    -->
                <!-- <div class="item  height-full"><img src="images/photos/<?php echo $row['image4']; ?>"  class="img-responsive" alt="slide"></div>  -->
                </div>
                <!-- Controls -->
                <!-- <a class="left carousel-control" href="#RoomDetails" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a> -->
                <!-- <a class="right carousel-control" href="#RoomDetails" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a> -->
            </div>
  <!-- RoomCarousel-->


<div class="room-features spacer">
  <div class="row">
    <div class="col-sm-12 col-md-5">
    <p><?php echo $row['citta']; ?></p>
    </div>
    <div class="col-sm-6 col-md-3 amenitites">
    <h3>Common Facilities</h3>
    <ul>
      <li>Television with more than 400 channels.</li>
      <li>Attached bathroom with bath-tub.</li>
      <li>Wide balcony towards beautiful garden.</li>
      <li>House keeping 3 times per day.</li>
      <li>24 hours water supply.</li>
    </ul>


    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Size<span><?php echo $row['numero_civico']; ?> sq</span></div>
    </div>
    <div class="col-sm-3 col-md-2">
      <div class="size-price">Price<span><?php echo $row['via']; ?> /-</span></div>
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

</div>

