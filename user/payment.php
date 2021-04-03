<?php  
include('server.php');

$ID = $_GET['ID'];

$sql = "SELECT * FROM tbl_order WHERE id='$ID' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$row_am = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
    <title>แจ้งชำระเงิน</title>
    <meta charset="UTF-8">
</head>
<body>
<?php include('header.php'); ?>

<div class="container">


<form class="imgForm" action="payment_db.php" method="post" enctype="multipart/form-data">
<div class="container" style="margin-left: 130px;">
<input type="hidden" name="id" value="<?php echo $row_am['id']; ?>" />

<table class="table table-bordered">
    <thead >
        <tr >    
            <th>ID</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;__ที่อยู่__</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;__________สินค้า___________</th>
            <th>ราคารวม</th>
            
        </tr>
    </thead>

        <tr>
            <td><?php echo $row_am['id']; ?></td>
            <td><?php echo $row_am['or_firstname']," ",$row_am['or_lastname'];?>
              <br><?php echo $row_am['or_tel']; ?><br><?php echo $row_am['or_address']; ?></td>
            <td ><?php echo $row_am['or_product']; ?></td>
            <td >฿<?php echo $row_am['or_total']; ?></td> 
        </tr>     
</table>
</div>
  <h6 class="text-center lead">ชำระผ่านธนาคาร</h6>
      <div class="form-group">
        <select name="pmode" class="form-control">
          <option value="" selected disabled>เลือกธนาคาร</option>
          <option value="ธนาคารไทยพานิชย์ 0115633738 (นายมดเขียว เรืองแสง)">ธนาคารไทยพานิชย์ 0115633738 (บริษัท ฟาร์มไก่ไข่ จำกัด)</option>
          <option value="ธนาคารกรุงไทย 0154785425 (นายมดเขียว เรืองแสง)">ธนาคารกรุงไทย 0154785425 (บริษัท ฟาร์มไก่ไข่ จำกัด)</option>
          <option value="ธนาคารกสิกรไทย 0321551421 (นายมดเขียว เรืองแสง)">ธนาคารกสิกรไทย 0321551421 (บริษัท ฟาร์มไก่ไข่ จำกัด)</option>
        </select> <br>
    <input type="file" name="p_img" id="p_img" class="form-control" /> <br> <br>
    <button type="submit" class="btn btn-success" > บันทึก </button>

</form>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>


<script type="text/javascript">
$(document).ready(function() {

  // Change the item quantity
  $(".itemQty").on('change', function() {
    var $el = $(this).closest('tr');

    var pid = $el.find(".pid").val();
    var pprice = $el.find(".pprice").val();
    var qty = $el.find(".itemQty").val();
    location.reload(true);
    $.ajax({
      url: 'action.php',
      method: 'post',
      cache: false,
      data: {
        qty: qty,
        pid: pid,
        pprice: pprice
      },
      success: function(response) {
        console.log(response);
      }
    });
  });

  // Load total no.of items added in the cart and display in the navbar
  load_cart_item_number();

  function load_cart_item_number() {
    $.ajax({
      url: 'action.php',
      method: 'get',
      data: {
        cartItem: "cart_item"
      },
      success: function(response) {
        $("#cart-item").html(response);
      }
    });
  }
});
</script>
</body>
</html>
