<?php

include('server.php');
date_default_timezone_set('Asia/Bangkok');

$date1 = date("Ymd_His");

$numrand = (mt_rand());

$p_name = $_POST['p_name'];
// $type_id = $_POST[''];
$p_detail = $_POST['p_detail'];
$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
$p_price = $_POST['p_price'];
//img
$upload = $_FILES['p_img'];
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
// เพิ่มไฟล์เข้าไปในตาราง uploadfile

$sql = "INSERT INTO tbl_product
		(
		p_name,
		'type_id',
		p_detail,
		p_img,p_price
		)
		VALUES
		(
		'$p_name',
		'$type_id',
		'$p_detail',
		'$newname',$p_price)";

$result = mysqli_query($conn, $sql); // or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);
// javascript แสดงการ upload file


if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('Add Succesfuly');";
    echo "window.location = 'product_m.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error back to upload again');";
    echo "window.location = 'product.php'; ";
    echo "</script>";
}
?>

