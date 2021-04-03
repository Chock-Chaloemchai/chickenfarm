<?php 
include('server.php');
 $id = $_POST["id"];
 $tracknumber = $_POST["tracknumber"];

$sql = "UPDATE tbl_order SET 
        track='$tracknumber'
        WHERE id='$id' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกสำเร็จ');";
    echo "window.location = 'order_show.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('บันทึกไม่สำเร็จ');";
    echo "window.location = 'payment.php'; ";
    echo "</script>";
}
?>
?>