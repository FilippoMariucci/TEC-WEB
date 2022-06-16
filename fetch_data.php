<?php

//fetch_data.php

include('db.php');

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM room
 ";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["brand"]))
 {
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
   AND product_brand IN('".$brand_filter."')
  ";
 }
 if(isset($_POST["ram"]))
 {
  $ram_filter = implode("','", $_POST["ram"]);
  $query .= "
   AND product_ram IN('".$ram_filter."')
  ";
 }
 if(isset($_POST["storage"]))
 {
  $storage_filter = implode("','", $_POST["storage"]);
  $query .= "
   AND product_storage IN('".$storage_filter."')
  ";
 }

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output .= '
   <div class="row">
      <!-- populate table from mysql database -->
      <?php while($row = mysqli_fetch_array($search_result)):?>
      <?php $imageURL = 'uploads/'.$row["file_name"]; ?>
      <div class="col-sm-6 wowload fadeInUp">
       <div class="rooms">
          <img class="img-responsive" src="<?php echo $imageURL; ?>"/>
          <div class="info">
              <h3><?php echo $row['descrizione']; ?></h3>
              <p style="color: darkgreen;"> Size: <?php echo $row['dimensioni']; ?> sq. feet<br> Per Night: <?php echo $row['citta']; ?> Taka Only</p>
              <a href="room-details.php?id=<?php echo $row['room_id']; ?>" class="btn btn-default">Check Details</a>

              <a href="aggiungi_preferiti.php?id=<?php echo $row['room_id'];?> " class="btn btn-default">Aggiungi ai Preferiti</a>

          </div>
      </div>
  </div>
     <?php endwhile;?>
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
