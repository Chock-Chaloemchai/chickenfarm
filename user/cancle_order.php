<?php

include('server.php');

  $ID = $_GET["ID"];


  
  $sql = "DELETE FROM tbl_order  WHERE id='$ID' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($conn); 
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('ยกเลิกคำสั่งซื้อสำเร็จ');";
  echo "window.location = 'order_show_user.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง');";
  echo "</script>";
}
?>