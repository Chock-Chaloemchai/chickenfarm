
<?php
include('server.php');
include('h.php');
$query = "SELECT * FROM tbl_order " or die("Error:" . mysqli_error());
$result = mysqli_query($conn, $query);
$row_am = mysqli_fetch_assoc($result);

?>
<script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>
  <?php if (isset($row_am['id'])) {?>
    <table border="2" class="display table table-bordered" id="example1" align="center" wi >
    <thead>
        <tr class="info">    
            <th>ID</th>
            <th>data_customer</th>
            <th>Bank</th>
            
            <th>__________Products___________</th>
            <th>Amount total</th>
            <th>___Status___</th>
            <th>___Track___</th>
            
            
        </tr>
    </thead>
    <?php do { ?>

        <tr>
            <td><?php echo $row_am['id']; ?></td>
            <td><?php echo $row_am['or_firstname']," ",$row_am['or_lastname'];?>
              <br><?php echo $row_am['or_tel']; ?><br><?php echo $row_am['or_address']; ?></td>
            <td ><?php echo $row_am['or_bank']; ?></td>
            <td ><?php echo $row_am['or_product']; ?></td>
            <td ><?php echo $row_am['or_total']; ?></td>
            <td>  
            <?php if ($row_am['or_img']!='') {?>
                <font color='green'>ชำระเงินแล้ว</font><br>
                <a class="" href="payment_detail.php?ID=<?php echo $row_am['id']; ?>" >รายละเอียด</a>
              
            <?php } else { ?>
                <font color='red' >รอชำระเงิน</font>
              
              <?php } ?>
            </td> 
            <td>
            <?php if ($row_am['or_img']!='') {?>
              <?php if ($row_am['track']=='') {?>
                <a href="add_track.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-warning btn-xs">Add track number</a>
              <?php } else { ?>
                <h1><?php echo $row_am['track']; ?></h1>
              <a href="edit_track.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-warning btn-xs">Edit track</a>
                
                <?php } ?>
            <?php } else { ?>
              
              
              <?php } ?>
              
             </td> 
             

    <?php } while ($row_am = mysqli_fetch_assoc($result)); ?>

</table>
    
            <?php } else { ?>
              <table border="2" class="display table table-bordered" id="example1" align="center"  >
    <thead>
        <tr class="info">    
            <th>ID</th>
            <th>data_customer</th>
            <th>Bank</th>
            
            <th>__________Products___________</th>
            <th>Amount total</th>
            <th>___Status___</th>
            <th>___Track___</th>
            
        </tr>
    </thead>
              
              <?php } ?>

