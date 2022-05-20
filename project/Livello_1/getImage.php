<?php
// Include the database configuration file
include 'connection_1.php';

// Get images from the database
$query = $mysqli->query("SELECT * FROM alloggio ORDER BY id_alloggio  DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../../uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
