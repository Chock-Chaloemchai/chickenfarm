<?php

include('server.php');  
include('h.php'); 


$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());

$result = mysqli_query($conn, $query);

?>

<div class="container">
  <div class="row">
      <form  name="addproduct" action="product_from_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            
             <p> ราคา (บาท) </p>
            <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
             <textarea  name="p_detail" rows="5" cols="60"></textarea>
          </div>
        </div>
        <div class="form-group">
          
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>

