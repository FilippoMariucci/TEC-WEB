<?php include 'header.php';?>

<div class="container">





<!-- form -->
<?php
include_once("db.php");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `room` WHERE CONCAT(`citta`, `descrizione`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `room`";
    $search_result = filterTable($query);
}


if(isset($_POST['from_date']) && isset($_POST['to_date']))
{
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $query = "SELECT * FROM room WHERE data_inizio BETWEEN '$from_date' AND '$to_date' UNION SELECT * FROM room WHERE data_fine BETWEEN '$from_date' AND '$to_date' ";
  $search_result = filterTable($query);
  }


if(isset($_POST['from_price']) && isset($_POST['to_price']))
{
  $from_price = $_POST['from_price'];
  $to_price = $_POST['to_price'];
  $query = "SELECT * FROM room WHERE prezzo BETWEEN '$from_price' AND '$to_price'  ";
  $search_result = filterTable($query);
  }


if(isset($_POST['search2']))
{
    $valueToSearch2 = $_POST['valueToSearch2'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `room` WHERE `wi_fi` LIKE '%".$valueToSearch2."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `room`";
    $search_result = filterTable($query);
}

if(isset($_POST['search3']))
{
    $valueToSearch3 = $_POST['valueToSearch3'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `room` WHERE `parcheggio` LIKE '%".$valueToSearch3."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `room`";
    $search_result = filterTable($query);
}


if(isset($_POST['search4']))
{
    $valueToSearch4 = $_POST['valueToSearch4'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `room` WHERE `cucina` LIKE '%".$valueToSearch4."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `room`";
    $search_result = filterTable($query);
}

if(isset($_POST['search5']))
{
    $valueToSearch5 = $_POST['valueToSearch5'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `room` WHERE `elettrodomestici` LIKE '%".$valueToSearch5."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `room`";
    $search_result = filterTable($query);
}





// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "hotelms");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>




<!DOCTYPE html>
<html>

    <body>


    <div class="container">
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <h4>Cerca il tuo alloggio presso: <input type="text" name="valueToSearch"  placeholder="Search City"><button type="submit" name="search" value="Filter" class="btn btn-primary" style="margin-left:5px">Search</button></h4>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>





  <form action="" method="post">

      <p>Periodo disponibilità alloggio:<label>Da<input type="date" name="from_date" class="form-control"></label><label>A<input type="date" name="to_date" class="form-control"></label><button type="submit" name="date" class="btn btn-primary">Filter</button></p>

  </form>




 <form action="" method="post">

      <p>Fascia di Prezzo:<label>DA €<input type="number" name="from_price" class="form-control"></label><label>A €<input type="number" name="to_price" class="form-control"></label><button type="submit" name="price" class="btn btn-primary">Filter</button></p>

    </form>

<div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <h4>Wi-fi: <input type="text" name="valueToSearch2"  placeholder="write 'yes' or 'no'"><button type="submit" name="search2" value="Filter" class="btn btn-primary" style="margin-left:5px">Search</button></h4>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

  </div>

  <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <h4>Parcheggio: <input type="text" name="valueToSearch3"  placeholder="write 'yes' or 'no'"><button type="submit" name="search3" value="Filter" class="btn btn-primary" style="margin-left:5px">Search</button></h4>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



  <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <h4>Cucina: <input type="text" name="valueToSearch4"  placeholder="write 'yes' or 'no'"><button type="submit" name="search4" value="Filter" class="btn btn-primary" style="margin-left:5px">Search</button></h4>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

   <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
                                    <div class="input-group mb-3">
                                        <h4>Elettrodomestici: <input type="text" name="valueToSearch5"  placeholder="write 'yes' or 'no'"><button type="submit" name="search5" value="Filter" class="btn btn-primary" style="margin-left:5px">Search</button></h4>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="row">
      <!-- populate table from mysql database -->
      <?php while($row = mysqli_fetch_array($search_result)):?>
      <?php $imageURL = 'uploads/'.$row["file_name"]; ?>
      <div class="col-sm-6 wowload fadeInUp">
       <div class="rooms">
          <img class="img-responsive" style="height:100%; width:100%"src="<?php echo $imageURL; ?>"/>
          <div class="info">
              <h3><?php echo $row['citta']; ?></h3>
              <p style="color: darkgreen;"> Size: <?php echo $row['dimensioni']; ?> m^2<br> Price: <?php echo $row['prezzo']; ?>€</p>
              <a href="room-details.php?id=<?php echo $row['room_id']; ?>" class="btn btn-default">Check Details</a>

              

          </div>
      </div>
  </div>
     <?php endwhile;?>

        </form>

    </body>
</html>


</div>


</div>

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
