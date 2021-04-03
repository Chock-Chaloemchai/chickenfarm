<?php 
include('server.php');
$id = $_POST["id"];
 $pmode = $_POST["pmode"];
 $date1 = date("Ymd_His");
 $numrand = (mt_rand());
 $p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
 $upload = $_FILES['p_img']['name'];
 if ($upload <> '') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path = "p_img/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type = strrchr($_FILES['p_img']['name'], ".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = 'p_img' . $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "p_img/" . $newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['p_img']['tmp_name'], $path_copy);
}
$sql = "UPDATE tbl_order SET 
        or_bank='$pmode',
        or_img='$newname'
        WHERE id='$id' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('ชำระเงินสำเร็จ');";
    echo "window.location = 'order_show_user.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ชำระเงินไม่สำเร็จ');";
    echo "window.location = 'payment.php'; ";
    echo "</script>";
}
?>
?>