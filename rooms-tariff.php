<?php include 'header.php';?>

<div class="container">

<h2>Rooms &amp; Tariff</h2>



<!-- form -->
<?php
include_once("connection_1.php");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `alloggio` WHERE CONCAT(`citta`, `descrizione`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
 else {
    $query = "SELECT * FROM `alloggio`";
    $search_result = filterTable($query);
}


if(isset($_POST['from_date']) && isset($_POST['to_date']))
{
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $query = "SELECT * FROM alloggio WHERE data_inizio BETWEEN '$from_date' AND '$to_date' UNION SELECT * FROM alloggio WHERE data_fine BETWEEN '$from_date' AND '$to_date' ";
  $search_result = filterTable($query);
  }
  else {
    echo("no result found");
}

if(isset($_POST['from_price']) && isset($_POST['to_price']))
{
  $from_price = $_POST['from_price'];
  $to_price = $_POST['to_price'];
  $query = "SELECT * FROM alloggio WHERE prezzo BETWEEN '$from_price' AND '$to_price'  ";
  $search_result = filterTable($query);
  }
  else {
    echo("no result found");
}




// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "tecnologieweb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

    <body>


    <form action="" method="post">
    <div class="location">
      <input type="text" name="valueToSearch" placeholder="Value To Search">
      <input type="submit" name="search" value="Filter"><br><br>
    </div>
    </form>

    <div class="tipologia">
      <input type="radio" name="tipo">
      <label>Appartamento</label><br>
      <input type="radio" name="tipo">
      <label>Posto Letto</label>
    </div>

  <form action="" method="post">
     <button id="btn" onclick="myFunction('drop', 'btn'); bordo('drop', 'drop2')" class="dropbtn">
      <p>Periodo di Locazione</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop" class="tendina">
      <label>Check In
        <input type="date" name="from_date" class="form-control">
      </label><br>
      <label>Check Out
        <input type="date" name="to_date" class="form-control">
      </label>
      <button type="submit" name="date" class="btn btn-primary">Filter</button>
    </div>
  </form>




 <form action="" method="post">
<button id="btn2" onclick="myFunction('drop2', 'btn2'); bordo('drop', 'drop2')" class="dropbtn2">
      <p>Fascia di Prezzo</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop2" class="tendina2">
      <label>DA €
        <input type="number" name="from_price" class="form-control">
      </label><br>
      <label>A €
        <input type="number" name="to_price" class="form-control">
      </label>
      <button type="submit" name="price" class="btn btn-primary">Filter</button>
    </div>
    </form>


  </div>


<div class="row">
      <!-- populate table from mysql database -->
      <?php while($row = mysqli_fetch_array($search_result)):?>
      <?php $imageURL = '../../uploads/'.$row["file_name"]; ?>
      <div class="col-sm-6 wowload fadeInUp">
       <div class="rooms">
          <img class="img-responsive" src="<?php echo $imageURL; ?>"/>
          <div class="info">
              <h3><?php echo $row['descrizione']; ?></h3>
              <p style="color: darkgreen;"> Size: <?php echo $row['dimensioni']; ?> sq. feet<br> Per Night: <?php echo $row['citta']; ?> Taka Only</p>
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
        y.style.borderBottom = "1px solid #34495e"
      }
    }
    function bordo(id1, id2){
      var x = document.getElementById(id1);
      var y = document.getElementById(id2);
      if((x.style.display === "block") && (y.style.display === "block")){
        y.style.borderLeft = "none"
      } else{
        y.style.borderLeft = "1px solid #34495e"
      }
    }

  </script>


