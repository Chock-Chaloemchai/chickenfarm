<?php
//1. เชื่อมต่อ database: 
include('server.php');
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $id = $_POST["id"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $password= ($_POST["password1"]);
  $address = $_POST["adress"];
  $tel = $_POST["tel"];

   
 
  $sql = "UPDATE tbl_user SET  
      firstname='$firstname' , 
      lastname='$lastname' , 
      username='$username',
      password='$password',
      adress='$address',
      tel='$tel'
      WHERE id='$id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($conn); 
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'profile.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>



