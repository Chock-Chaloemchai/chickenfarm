
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Chickenfarm</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<?php include('header.php'); ?>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/Hen-Egg.jpg"alt="First slide">
                </div>
                <div class="carousel-item">
                    <a href="img/pexels-photo-576831.webp"></a> 
                    <img class="d-block w-100" src="img/1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/2.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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