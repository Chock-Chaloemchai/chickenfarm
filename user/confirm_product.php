<?php
session_start();
include ('server.php');
date_default_timezone_set('Asia/Bangkok');
$user = $_SESSION['username'];
$ID = $_GET['ID'];
$sql="INSERT INTO  tbl_history SELECT * FROM tbl_order WHERE id='$ID'" ;
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$sql1 ="DELETE FROM tbl_order WHERE id='$ID'";
$result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
mysqli_close($conn);
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Succesfuly');";
    echo "window.location = 'history_show_user.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'order_show_user.php'; ";
    echo "</script>";
}

?>