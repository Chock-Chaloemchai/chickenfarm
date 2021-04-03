<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>Contact</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/stypefont.css" rel="stylesheet" type="text/css"/>
        <link href="css/stype.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

    <?php include('header.php'); ?>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/S__3104807.jpg">
                </div>
                
            </div>
            
        </div>
           <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>


<script type="text/javascript">
$(document).ready(function() {

// Sending Form data to the server
$("#placeOrder").submit(function(e) {
  e.preventDefault();
  $.ajax({
    url: 'action.php',
    method: 'post',
    data: $('form').serialize() + "&action=order",
    success: function(response) {
      $("#order").html(response);
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
        
                </body>
                </html>