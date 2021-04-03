<?php

include('server.php');
date_default_timezone_set('Asia/Bangkok');


$p_name = $_POST['p_name'];
$p_detail = $_POST['p_detail'];
$p_price = $_POST['p_price'];
$p_id = $_POST['p_id'];
$p_img2 = $_POST['p_img2'];

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
}else {
    $newname = $p_img2;
}
// แก้ไขเข้าไปในตาราง uploadfile

$sql = "UPDATE tbl_product SET 
                                             p_name='$p_name',
		type_id='$type_id',
		p_detail='$p_detail',
		p_img ='$newname',
                                            p_price='$p_price'
                                            WHERE p_id=$p_id ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);
// javascript แสดงการ upload file


if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Edit Succesfuly');";
    echo "window.location = 'product_m.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
}
?>


