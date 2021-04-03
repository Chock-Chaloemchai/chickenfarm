<?php
session_start();
include ('server.php');

$errors = array();

if (isset($_POST['saveadmin'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $adress = mysqli_real_escape_string($conn, $_POST['adress']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);


    if (empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Lastname is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match ");
    }
    if (empty($adress)) {
        array_push($errors, "Adress is required");
    }
    if (empty($tel)) {
        array_push($errors, "Telephone is required");
    }


    $user_check_query = "SELECT * FROM tbl_user WHERE username = '$username'  OR tel = '$tel' ";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($result['username'] === $tel) {
            array_push($errors, "Telephone already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql = "INSERT INTO tbl_user (firstname, lastname, username, password, adress,tel,userlevel) VALUES ('$firstname', '$lastname', '$username', '$password', '$adress','$tel','a')";
        mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>";
        echo "alert('Succesfuly');";
        echo "window.location = 'admin_show.php'; ";
        echo "</script>";
        
    } else {
        array_push($errors, "Username already exists");
        $_SESSION['errors'] = "Username already exists";
        header("location: register.php");
    }
}
?>


