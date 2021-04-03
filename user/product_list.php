<?php

include('server.php');  
$query = "
SELECT * FROM tbl_product as p 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());

$result = mysqli_query($conn, $query);


echo  ' <table class="table table-hover">';

    echo "<tr>
      <td width='5%'>id</td>
      <td width=30%>name</td>
      <td width=25%>img</td>
      <td width=25%>price</td>
      <td width=5%>edit</td>
      <td width=5%>delete</td>
    </tr>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$row["p_id"] .  "</td> ";
    echo "<td>" .$row["p_name"] .  "</td> ";
    //echo "<td>" .$row["type_name"] .  "</td> ";
    echo "<td >"."<img src='p_img/".$row['p_img']."' width='100'>"."</td>";
    echo "<td>" .$row["p_price"] .  "</td> ";
    
    echo "<td><a href='product_from_edit.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>edit</a></td> ";
    
    
    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($conn);
?>

