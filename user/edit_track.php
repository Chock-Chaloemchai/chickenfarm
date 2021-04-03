<?php
session_start();
include ('server.php');
include('h.php');
if ($_SESSION['userlevel'] != 'a') {
    header('location: index.php');
}

$ID = $_GET['ID'];

$sql = "SELECT * FROM tbl_order WHERE id='$ID' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);

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
                <form  name="addproduct" action="edit_track_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal"><br>
         <div class="u-form-group">
             <p>Edit track number</p>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                    <input type="tracknumber" name="tracknumber" placeholder="tracknumber" class="form-control" style="width: 300px;" value="<?php echo $row['track']; ?>"/>
                </div>
               
          <div class="form-group"><br>
            <button type="submit" class="btn btn-success" name="saveadmin"> บันทึก </button>
          
            
              
            
          </div>
        </div>
      </form>
                 </div>
            </div>
   