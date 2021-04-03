<?php 
    session_start();
    include('server.php'); 

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>Register</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
        <!--CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/loginstype.css" rel="stylesheet" type="text/css"/>
        <link href="css/stypefont.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div class="nav-scroller py-1 navlog"  style="background-color: #CD853F;">
            <nav class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2 d-none d-md-inline-block text-white"  href="index.php">หน้าหลัก</a>
                <a class="py-2 d-none d-md-inline-block text-white" href="product_all.php">สินค้า</a>
             
                <a class="py-2 d-none d-md-inline-block text-white" href="contact.php">ติดต่อเรา</a>
        </div>   
        <div class="register-box">
            <div class="lb-header">
                <a href="login.php" id="login-box-link">Login</a>
                <a href="#"class="active" style="color: #FFA07A;" id="signup-box-link">Register</a>
            </div>
            
            <form class="email-signup" action="register_db.php" method="post">
               <?php include ('errors.php'); ?>
                 <?php if (isset($_SESSION['errors'])) : ?>
                                <div class="success">
                                    <h3>
                                                <?php
                                                echo $_SESSION['errors'];
                                                unset($_SESSION['errors']);
                                                ?>
                                    </h3>
                                </div>
                <?php endif ?>
                <div class="u-form-group">
                    <input type="firstname" name="firstname" placeholder="Firstname" />
                </div>
                <div class="u-form-group">
                    <input type="lastname" name="lastname" placeholder="Lastname" />
                </div>
                <div class="u-form-group">
                    <input type="username" name="username" placeholder="Username"/>
                </div>
                <div class="u-form-group">
                    <input type="password" name="password_1" placeholder="Password"/>
                </div>
                <div class="u-form-group">
                    <input type="adress" name="adress" placeholder="Adress"/>
                </div>
                 <div class="u-form-group">
                    <input type="tel" name="tel" placeholder="Tel"/>
                </div>
                <div class="u-form-group">
                    <button type="submit" name="reg_user" class="btn">Register</button>
                </div>
                <p>Already a member?
                    <a href="login.php">Login</a>
                </p>
            </form>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>