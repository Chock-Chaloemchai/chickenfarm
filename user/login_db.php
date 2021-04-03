<?php 
        session_start();
        include ('server.php');
        
        $errors = array();
        
        if  (isset($_POST['login_user'])) {
                $username = mysqli_real_escape_string($conn,  $_POST['username']);
                 $password = mysqli_real_escape_string($conn,  $_POST['password']);
           
                if (empty($username)) {
                    array_push($errors,"Username is required");
                }
                if (empty($password)) {
                    array_push($errors,"Password is required");
                }
                if (count($errors) == 0) {
                     $password = ($password);
                     $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' ";
                     $result = mysqli_query($conn, $query);
                     
                     if (mysqli_num_rows($result) == 1) {
                         $row = mysqli_fetch_array($result);
                         $_SESSION['username'] = $username;
                         $_SESSION['userlevel'] = $row['userlevel'];
                         
                         if ($_SESSION['userlevel'] == 'a') {
                             header("location: admin_show.php");
                         }
                         if ($_SESSION['userlevel'] == 'm') {
                             header("location: index.php");
                         }
                         
                     } else {
                         array_push($errors, "Wrong username/password combination");
                          $_SESSION['errors'] = "Wrong username or password try again ";
                         header("location: login.php");
                     }
                     
                    
                }
        } 
?>  


