<?php    include ('header.php');
include('server.php');
     
    $user = $_SESSION['username'];
    $query = "SELECT * FROM tbl_user WHERE username ='$user' " or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $query);
    $row_am = mysqli_fetch_array($result);
    $roeconvers = implode($row_am);
?>
<head>
<title>Profile</title>
</head>

<table border="2" class="display table table-bordered" id="example1" align="center"  >
    <thead>
        <tr class="info">    
            <th>ID</th>
            <th>Fistname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Address</th>
            <th>Tel</th>
            <th>edit</th>
        </tr>
    </thead>
 

        <tr>
            <td><?php echo $row_am['id']; ?></td>
            <td><?php echo $row_am['firstname']; ?></td>
            <td ><?php echo $row_am['lastname']; ?></td>
            <td ><?php echo $row_am['username']; ?></td>
            <td ><?php echo $row_am['adress']; ?></td>
            <td ><?php echo $row_am['tel']; ?></td>
            <td><a href="profile_edit.php?act=edit&ID=<?php echo $row_am['id']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
            
        </tr>

   

</table>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

  

<script type="text/javascript">
$(document).ready(function() {

  // Send product details in the server
  $(".addItemBtn").click(function(e) {
    e.preventDefault();
    var $form = $(this).closest(".form-submit");
    var pid = $form.find(".pid").val();
    var pname = $form.find(".pname").val();
    var pprice = $form.find(".pprice").val();
    var pimage = $form.find(".pimage").val();
    var pcode = $form.find(".pcode").val();

    var pqty = $form.find(".pqty").val();

    $.ajax({
      url: 'action.php',
      method: 'post',
      data: {
        pid: pid,
        pname: pname,
        pprice: pprice,
        pqty: pqty,
        pimage: pimage,
        pcode: pcode
      },
      success: function(response) {
        $("#message").html(response);
        window.scrollTo(0, 0);
        load_cart_item_number();
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
