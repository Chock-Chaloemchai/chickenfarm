<?php
//1. เชื่อมต่อ database: 
include('server.php');
include('h.php');

  $ID = $_GET["ID"];

  $query = "SELECT * FROM tbl_order  WHERE id='$ID' " or die("Error:" . mysqli_error());
  $result = mysqli_query($conn, $query);
  $row_am = mysqli_fetch_assoc($result);
  
?>

<img src="p_img/<?= $row_am['or_img'] ?>" >
  