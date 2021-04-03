<?php
session_start();
include ('server.php');
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/stypefont.css" rel="stylesheet" type="text/css"/>
        <link href="css/test.css" rel="stylesheet"/>
        <link href="css/stype-stype.css" rel="stylesheet"/>
    </head>

    <body>
        <?php if (isset($_SESSION['sucess'])) : ?>
            <div class="success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>




        <nav class="navbar navbar-expand-lg navbar-light navb ">
            <!-- <img src="img/IMG_4414.GIF" alt="" style="width: 140px;height: 140px;margin-right: 20px;margin-bottom: 10px;margin-top: 10px;margin-left: 20px;"> -->
            <a class="navbar-brand text-white" href="index.php">Chickenfarm</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <ul class="navbar-nav ml-auto">



                        <?php if (isset($_SESSION['username'])) { ?>
                        <a href="cart.php"class="cart">
                        <span id="cart-item" class="badge badge-danger"></span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>   
                        </a>
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" 
                                         style="
                                         margin-right: 3px;
                                         margin-bottom: 6px;">
                                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                    Welcome <?php echo $_SESSION['username']; ?>
                                </a>
                                <?php if ($_SESSION['userlevel']=='a') { ?>
                                <div class="dropdown-menu dropac" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="admin_show.php">Admin</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <p><a class="dropdown-item "  href="index.php?logout='1' " >Logout</a></p>
                                    <?php endif ?>
                                </div>
                                <?php } else { ?>
                                    <div class="dropdown-menu dropac" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="order_show_user.php">Order</a>
                                    <a class="dropdown-item" href="history_show_user.php">ประวัติการซื้อ</a>
                                    <div class="dropdown-divider"></div>
                                    <?php if (isset($_SESSION['username'])) : ?>
                                        <p><a class="dropdown-item "  href="index.php?logout='1' " >Logout</a></p>
                                    <?php endif ?>
                                </div>
                                <?php } ?>
                            <?php } else { ?>
                            </li>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill pericon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="login.php">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                   

                </ul>
            </div>
        </nav>


        <nav class="container d-flex flex-column flex-md-row justify-content-between" >
            <a class="py-2 d-none d-md-inline-block  proce"   href="index.php">หน้าหลัก</a>
            <a class="py-2 d-none d-md-inline-block  proce"  href="product_all.php">สินค้า</a>

            <!-- <a class="nav-link dropdown-toggle text-success proce " href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                สินค้า
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-success " href="product_all.php">สินค้าทั้งหมด</a>
                <a class="dropdown-item text-success" href="product_1.php">ยาสามัญประจำบ้าน</a>
                <a class="dropdown-item text-success" href="product_2.php">อาหารเสริม</a>
                <a class="dropdown-item text-success" href="product_3.php">อุปกรณ์ทางการแพทย์</a>
                <a class="dropdown-item text-success" href="product_4.php">ความงามและเวชสำอาง</a>
                <a class="dropdown-item text-success" href="product_5.php">ผลิตภัณฑ์สุขภาพทางเพศ</a>
            </div> -->
            <a class="py-2 d-none d-md-inline-block  proce" href="register.php">สมัครสมาชิก</a>
            <a class="py-2 d-none d-md-inline-block  proce" href="contact.php">ติดต่อเรา</a>
        </nav>
       


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
