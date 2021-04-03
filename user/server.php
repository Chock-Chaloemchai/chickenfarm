<?php
        $servername = "localhost";
        $username ="root";
        $password ="";
        $dbname="pharamacy";
        
        //Create Connection
        $conn= mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if  (!$conn) {
                die("Connection failed" . mysql_connect_error());
        } 
       
       
?>
