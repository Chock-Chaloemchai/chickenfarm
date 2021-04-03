
<?php
include('server.php');
include('h.php');
$query = "SELECT * FROM tbl_user WHERE userlevel ='a' " or die("Error:" . mysqli_error());
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

<table border="2" class="display table table-bordered" id="example1" align="center"  >
    <thead>
        <tr class="info">    
            <th>ID</th>
            <th>Fistname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Address</th>
            <th>Tel</th>
            <th>Userlevel</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <?php do { ?>

        <tr>
            <td><?php echo $row_am['id']; ?></td>
            <td><?php echo $row_am['firstname']; ?></td>
            <td ><?php echo $row_am['lastname']; ?></td>
            <td ><?php echo $row_am['username']; ?></td>
            <td ><?php echo $row_am['adress']; ?></td>
            <td ><?php echo $row_am['tel']; ?></td>
            <td ><?php echo $row_am['userlevel']; ?></td>
            <td><a href="admin_from_edit.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
            <td><a href="admin_del_db.php?ID=<?php echo $row_am['id']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
        </tr>

    <?php } while ($row_am = mysqli_fetch_assoc($result)); ?>

</table>

