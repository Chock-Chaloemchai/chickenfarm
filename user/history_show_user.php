<?php
include('server.php');
// if ($_SESSION['userlevel'] != 'm') {
//     header('location: index.php');
// }
 include('header.php'); 

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>ประวัติการสั่งซื้อ</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/stypefont.css" rel="stylesheet" type="text/css" />
    <link href="css/stype-stype.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
    <div class="table-responsive-xl">
    <table class="table table-bordered">

            <?php include('history_show_user_db.php'); ?>
         </table>
            </div>
    </div>
  </body>
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


</html>