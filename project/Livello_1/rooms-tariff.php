<?php include 'header.php';?>

<div class="container">

<h2>Rooms &amp; Tariff</h2>



<!-- form -->
<?php

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

    <button id="btn" onclick="myFunction('drop', 'btn'); bordo('drop', 'drop2')" class="dropbtn">
      <p>Periodo di Locazione</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop" class="tendina">
      <label>DA
        <input type="date">
      </label><br>
      <label>A
        <input type="date">
      </label>
    </div>

    <button id="btn2" onclick="myFunction('drop2', 'btn2'); bordo('drop', 'drop2')" class="dropbtn2">
      <p>Fascia di Prezzo</p>
      <i class="fa fa-caret-down"></i>
    </button>
    <div id="drop2" class="tendina2">
      <label>DA €
        <input type="number">
      </label><br>
      <label>A €
        <input type="number">
      </label>
    </div>

    <div class="send">
      <button class="fa fa-search" type="submit" name="submit"></button>
    </div>


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
              <a href="room-details.php?id=<?php echo $row['id_alloggio']; ?>" class="btn btn-default">Check Details</a>
          </div>
      </div>
  </div>
                <?php endwhile;?>
            </table>
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


