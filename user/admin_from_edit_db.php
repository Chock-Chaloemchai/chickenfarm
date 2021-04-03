<?php
//1. เชื่อมต่อ database: 
include('server.php');
include('h.php');
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $id = $_POST["id"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $password= MD5($_POST["password1"]);
  $address = $_POST["adress"];
  $tel = $_POST["tel"];
  $userlevel = $_POST["userlevel"];

$user_check_query = "SELECT * FROM tbl_user WHERE username = '$username'  OR tel = '$tel' ";
    $query = mysqli_query($conn, $user_check_query);
    $result1 = mysqli_fetch_assoc($query);

   
 
  $sql = "UPDATE tbl_user SET  
      firstname='$firstname' , 
      lastname='$lastname' , 
      username='$username',
      password='$password',
      adress='$address',
      tel='$tel',
      userlevel='$userlevel' 
      WHERE id='$id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($conn); 
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'user_show.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>



