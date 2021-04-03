<?php
include ('h.php');
//session_start();
include('server.php');
// if ($_SESSION['userlevel'] != 'm') {
//     header('location: index.php');
// }
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
        <title>Profile Edit</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/stype.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>


        
        
                <?php include ('header.php'); ?>
                <div class="container">
         <div class="col-md-6">

            <form name="admin" action="profile_edit_db.php" method="post" id="admin" class="form-horizontal">
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
                    <button type="submit" name="save"class="btn btn-success btn-sm" ><span class="glyphicon-saved">
                        </span> บันทึก</button>

                </div>
            </form>
            </div>
            </div>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>


