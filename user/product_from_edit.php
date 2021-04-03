<?php
session_start();
include ('server.php');
if ($_SESSION['userlevel'] != 'a') {
    header('location: index.php');
}
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_product as p WHERE p.p_id=$ID";
$results = mysqli_query($conn, $sql) or die ("Error in query : $sql " . mysqli_errno());
$row = mysqli_fetch_array($results);
extract($row);

$type_id = $row['type_id'];


$query = "SELECT * FROM tbl_type WHERE type_id != $type_id " or die("Error:" . mysqli_error());
$result2 = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>Pharamacy</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/stype.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg" 
                                     style="
                                     margin-right: 3px;
                                     margin-bottom: 6px;">
                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                                Welcome <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <?php if (isset($_SESSION['username'])) : ?>
                                    <p><a class="dropdown-item "  href="index.php?logout='1' " >Logout</a></p>
                                <?php endif ?>
                            </div>
                        <?php } else { ?>
                        </li>
                        <a class ="container-md">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <?php include ('menu_left.php'); ?>
            </div>
            
            
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <form  name="addproduct" action="product_from_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <h4> แก้ไขข้อมูลสินค้า </h4>
                                    <p> ชื่อสินค้า</p>
                                    <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" 
                                           value="<?php echo $row['p_name']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    
                                    
                                        
                                       
                                    </select>
                                    <p> ราคา (บาท) </p>
                                    <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" value="<?php echo $row['p_price']; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p> รายละเอียดสินค้า </p>
                                    <textarea  name="p_detail" rows="5" cols="60"><?php echo $row['p_detail']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-12">
                                     ภาพเก่า <br>
                                    <img src="p_img/<?php echo $row['p_img']; ?>" width="200px">
                                    <br><br>
                                    <input type="file" name="p_img" id="p_img" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="p_img2" value="<?php echo $row['p_img']; ?>" >
                                    <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>" >
                                    <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>









            <!--Bootstrap core JavaScript
            ==================================================-->
            <!--Optional JavaScript-->
            <!--jQuery first, then Popper.js, then Bootstrap JS-->
            <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin = "anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>



