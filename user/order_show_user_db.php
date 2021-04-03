<?php
include('server.php');
$user = $_SESSION['username'];
$query = "SELECT * FROM tbl_order  WHERE username = '$user' " or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
$row_am = mysqli_fetch_assoc($result);

?>


  <?php if (isset($row_am['id'])) {?>
    <table border="2" class="display table table-bordered " id="example1" align="center" >
    <thead >
        <tr >    
            <th>ID</th>
            <th>ที่อยู่</th>
            <th>ธนาคาร</th>
            
            <th>สินค้า(จำนวนชิ้น)</th>
            <th scope="col" class="text-nowrap">ราคารวม</th>
            <th >สถานะ</th>
            <th scope="col" class="text-nowrap">หมายเลขพัสดุ</th>
            
        </tr>
    </thead>
    <?php do { ?>

        <tr>
            <td><?php echo $row_am['id']; ?></td>
            <td><?php echo $row_am['or_firstname']," ",$row_am['or_lastname'];?>
              <br><?php echo $row_am['or_tel']; ?><br><?php echo $row_am['or_address']; ?></td>
            <td ><?php echo $row_am['or_bank']; ?></td>
            <td ><?php echo $row_am['or_product']; ?></td>
            <td >฿<?php echo $row_am['or_total']; ?></td>
            <td>  
            <?php if ($row_am['or_img']!='') {?>
                <font color='green'>ชำระเงินแล้ว</font><br>
                <a class="" href="payment_detail.php?ID=<?php echo $row_am['id']; ?>" >รายละเอียด</a>
              
            <?php } else { ?>
                <font color='red' >ยังไม่ชำระเงิน</font><br><br>
                <a href="payment.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-success" >ชำระเงิน</a><br><br>
                <a href="cancle_order.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-danger" >ยกเลิกคำสั่งซื้อ</a>
              <?php } ?>
            </td> 
            
            <td>
            <?php if ($row_am['track']!='') {?>
                <?php echo $row_am['track']; ?>
                <br><a>(EMS)</a><br>
                <a href="confirm_product.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-warning btn-xs">ยืนยันรับสินค้า</a>
              
            <?php } else { ?>
              <a>ยังไม่จัดส่ง</a> 
            <?php } ?>
                
        
            </td> 
        </tr>     

    <?php } while ($row_am = mysqli_fetch_assoc($result)); ?>

</table>
    
            <?php } else { ?>
                <br>
                <h4><center>ไม่พบคำสั่งซื้อของคุณ</center></h4>
              
              <?php } ?>

