<?php
include ('h.php');
session_start();
include('server.php');
if ($_SESSION['userlevel'] != 'a') {
    header('location: index.php');
}
$ID = $_GET['ID'];

$sql = "SELECT * FROM tbl_user WHERE id='$ID' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
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
               
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <?php include ('menu_left.php'); ?>
            </div>

            <form name="admin" action="admin_from_edit_db.php" method="post" id="admin" class="form-horizontal">
                <h4> แก้ไขข้อมูล</h4>
              <input type="hidden" name="id" value="<?php echo $id; ?>"   />
                <div class="form-group">
                <p>ชื่อ</p>
                    <input type="firstname" name="firstname" placeholder="Firstname"  class="form-control" value="<?php echo $row['firstname']; ?>"/>
                </div>
                <div class="form-group">
                <p> นามสกุล</p>
                    <input type="lastname" name="lastname" placeholder="Lastname"  class="form-control" value="<?php echo $row['lastname']; ?>" />
                </div>
                <div class="form-group">
                <p> Username</p>
                    <input type="username" name="username" placeholder="Username"  class="form-control" value="<?php echo $row['username']; ?>"/>
                </div>
                <div class="form-group">
                <p>Password</p>
                    <input type="password" name="password1" placeholder="Password"  class="form-control" value="<?php echo $row['password']; ?>"/>
                </div>
                <div class="form-group">
                <p>address</p>
                    <input type="address" name="adress" placeholder="Address" class="form-control" value="<?php echo $row['adress']; ?>" />
                </div>
                <div class="form-group">
                <p> tel</p>
                    <input type="tel" name="tel" placeholder="Tel"  class="form-control" value="<?php echo $row['tel']; ?>" />
                </div>
                <div class="form-group">
                <p>Userlevel</p>
                    <input type="userlevel" name="userlevel" placeholder="Userlevel"  class="form-control" value="<?php echo $row['userlevel']; ?>" />

                </div>
                <div class="form-group">
                    <button type="submit" name="save"class="btn btn-success btn-sm" ><span class="glyphicon-saved">
                        </span> บันทึก</button>

                </div>
            </form>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>